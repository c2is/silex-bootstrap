<?php

/*
 * This file is part of the c2is/silex-bootstrap.
 *
 * (c) Morgan Brunot <brunot.morgan@gmail.com>
 */

namespace Core\Command;

use Symfony\Component\Console\Helper\FormatterHelper;

use Knp\Command\Command as BaseCommand;

/**
 * Application aware command
 *
 * Provide a silex application in CLI context.
 */
class Command extends BaseCommand
{
}
