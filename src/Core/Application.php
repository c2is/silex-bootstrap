<?php

/*
 * This file is part of the c2is/silex-bootstrap.
 *
 * (c) Morgan Brunot <brunot.morgan@gmail.com>
 */

namespace Core;

use Silex\Application as BaseApplication;

class Application extends BaseApplication
{
    use \Silex\Application\TwigTrait;
    use \Silex\Application\UrlGeneratorTrait;
    use \Silex\Application\MonologTrait;
    use \Silex\Application\SecurityTrait;
    use \Silex\Route\SecurityTrait;
}
