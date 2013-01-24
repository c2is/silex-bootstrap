<?php

/*
 * This file is part of the c2is/silex-bootstrap.
 *
 * (c) Morgan Brunot <brunot.morgan@gmail.com>
 */

require_once __DIR__.'/../src/bootstrap.php';

require_once __DIR__.'/../src/%camel_name%/app.php';

require_once __DIR__.'/../src/%camel_name%/context.php';

require_once __DIR__.'/../src/controllers.php';

require_once __DIR__.'/../src/%camel_name%/controllers.php';

$app->run();
