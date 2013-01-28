<?php

/*
 * This file is part of the c2is/silex-bootstrap.
 *
 * (c) Morgan Brunot <brunot.morgan@gmail.com>
 */

require_once __DIR__.'/../vendor/autoload.php';

use Core\Application;

use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\SecurityServiceProvider;

use Knp\Provider\ConsoleServiceProvider;

use Propel\Silex\PropelServiceProvider;

use Oziks\Provider\DebugToolbarServiceProvider;

$app = new Application(__DIR__, '%application_name%');

$app->register(new FormServiceProvider());
$app->register(new TranslationServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new SessionServiceProvider());
$app->register(new UrlGeneratorServiceProvider());

$app->register(new TwigServiceProvider(), [
    'twig.path' => array_merge(array(__DIR__.'/Resources/views/'), glob(__DIR__.'/*/Resources/views/')),
]);

$app->register(new MonologServiceProvider(), [
    'monolog.logfile' => __DIR__.'/../%normalized_name%.log',
]);

$app->register(new ConsoleServiceProvider(), [
    'console.name'              => '%normalized_name%',
    'console.version'           => '0',
    'console.project_directory' => __DIR__.'/..',
]);

// disabled propel if config file not exist
if (file_exists($propelConfigFile = __DIR__.'/Resources/config/generated/%normalized_name%-conf.php')) {
    $app->register(new PropelServiceProvider(), [
        'propel.config_file' => $propelConfigFile,
        'propel.model_path'  => __DIR__.'/../src',
    ]);
}
