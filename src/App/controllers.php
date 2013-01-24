<?php

/*
 * This file is part of the c2is/silex-bootstrap.
 *
 * (c) Morgan Brunot <brunot.morgan@gmail.com>
 */

$app->get('/', function() use ($app) {
    return $app->render('index.html.twig');
})->bind('homepage');
