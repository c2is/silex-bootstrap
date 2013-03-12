<?php

namespace %camel_name%\Controller;

use Silex\Application;

class MainController
{
    public function homeAction(Application $app)
    {
        return $app->render('index.html.twig');
    }
}
