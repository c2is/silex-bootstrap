<?php

/*
 * This file is part of the c2is/silex-bootstrap.
 *
 * (c) Morgan Brunot <brunot.morgan@gmail.com>
 */

namespace Core;

use Silex\Application as BaseApplication;

use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;

class Application extends BaseApplication
{
    use \Silex\Application\TwigTrait;
    use \Silex\Application\UrlGeneratorTrait;
    use \Silex\Application\MonologTrait;
    use \Silex\Application\SecurityTrait;
    use \Silex\Route\SecurityTrait;

    private $projectDirectory;

    public function __construct($projectDirectory, $name = 'UNKNOWN', $version = 'UNKNOWN', array $values = array())
    {
        parent::__construct($values);

        $this->projectDirectory = $projectDirectory;

        $this['name'] = $version;

        $this['version'] = $name;

        $this['config'] = $this->share(function () {
            $configDirectories = array_merge(
                array($this->projectDirectory.'/Resources/config'),
                glob($this->projectDirectory.'/*/Resources/config/')
            );

            return new FileLocator($configDirectories);
        });

        $this['routes'] = $this->share($this->extend('routes', function ($routes, $this) {
            $loader = new YamlFileLoader($this['config']);
            $collection = $loader->load('routing.yml');

            $routes->addCollection($collection);

            return $routes;
        }));
    }

    public function config($name, $option = null, $default = null, $currentPath = null)
    {
        $files = $this['config']->locate(sprintf('%s.yml', $name), $currentPath, false);

        if (null === $option) {
            return Yaml::parse(end($files));
        }

        $config = $default;
        foreach ($files as $file) {
            $configValues = Yaml::parse($file);

            if (isset($configValues[$option])) {
                $config = $configValues[$option];
            }
        }

        return $config;
    }
}
