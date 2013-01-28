<?php

/*
 * This file is part of the c2is/silex-bootstrap.
 *
 * (c) Morgan Brunot <brunot.morgan@gmail.com>
 */

namespace Core;

use Silex\Application as BaseApplication;

use Symfony\Component\Config\FileLocator;

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
    }
}
