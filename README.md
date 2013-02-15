silex-bootstrap
===============

![](https://api.travis-ci.org/c2is/silex-bootstrap.png)

A [Silex](http://silex.sensiolabs.org/) application which uses :
* [Propel](http://propelorm.org/)
* [Silex Web Profiler](http://fabien.potencier.org/article/66/debugging-silex-applications-just-got-funnier)
* [Behat](http://behat.org/)
* [Atoum](http://www.atoum.org/)

Installation
------------

Clone the silex-bootstrap project:
```shell
$ git clone git@github.com:c2is/silex-bootstrap.git && cd silex-bootstrap
```

Install vendor libraries with composer:
```shell
$ curl -s http://getcomposer.org/installer | php
$ php composer.phar install
```

You can run the application using the PHP built-in webserver:
```shell
$ php -S localhost:8000 -t web/
```
Open [http://localhost:8000/](http://localhost:8000/) in your browser to see silex-bootstrap running.

For more informations, see [the installation wiki page](https://github.com/c2is/silex-bootstrap/wiki/Installation).

Screenshots
-----------
![](https://raw.github.com/c2is/silex-bootstrap/master/doc/screenshot_1.png)

Issues
------
See [issues section](https://github.com/c2is/silex-bootstrap/issues).

Contributors
------
See [contributors section](https://github.com/c2is/silex-bootstrap/graphs/contributors).

Run the test suite
------
Functional tests are written with [Behat](http://behat.org/).
```shell
$ ./console tests:features
```
Unit tests are written with [Atoum](http://docs.atoum.org/).
```shell
$ ./console tests:units
```

License
-------

silex-bootstrap is released under the GPL License. See the bundled LICENSE file for details.
