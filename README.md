silex-bootstrap
===============

Installation
------------

Clone the silex-bootstrap project :
```shell
$ git clone git@github.com:c2is/silex-bootstrap.git ProjectName
```

Install vendor libraries with composer :
```shell
$ curl -s http://getcomposer.org/installer | php
$ php composer.phar install
```

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
