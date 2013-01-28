<?php

/*
 * This file is part of the c2is/silex-bootstrap.
 *
 * (c) Morgan Brunot <brunot.morgan@gmail.com>
 */

namespace tests\units\Core;

require_once __DIR__.'/../../bootstrap.php';

use mageekguy\atoum;

use Core\Application as CoreApplication;

class Application extends atoum\test
{
    public function testConstruct()
    {
        $app = new CoreApplication(__DIR__, 'test');

        $this
            ->boolean(isset($app['version']))
                ->isTrue()
            ->boolean(isset($app['name']))
                ->isTrue()
            ->boolean(isset($app['config']))
                ->isTrue()
        ;
    }
}
