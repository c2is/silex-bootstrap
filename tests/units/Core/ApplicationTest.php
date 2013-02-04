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

    public function testConfig()
    {
        $app = new CoreApplication(__DIR__, 'test');

        $result = $app->config('application', null, null, __DIR__.'/../snippets');
        $this
            ->array($result)
            ->hasSize(2)
            ->hasKeys(array('foo', 'foobar'))
            ->notHasKey('bar')
            ->containsValues(array(array('bar' => 'foo.bar value'), 'foobar value'))
        ;

        $result = $app->config('application', 'foo', null, __DIR__.'/../snippets');
        $this
            ->array($result)
            ->hasSize(1)
            ->hasKey('bar')
            ->contains('foo.bar value')
        ;

        $result = $app->config('application', 'barfoo', null, __DIR__.'/../snippets');
        $this
            ->variable($result)
            ->isNull()
        ;

        $result = $app->config('application', 'barfoo', 'barfoo value', __DIR__.'/../snippets');
        $this
            ->variable($result)
            ->isNotNull()
            ->isEqualTo('barfoo value')
        ;
    }
}
