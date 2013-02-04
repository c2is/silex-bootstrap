<?php

/*
 * This file is part of the c2is/silex-bootstrap.
 *
 * (c) Morgan Brunot <brunot.morgan@gmail.com>
 */

namespace Core\Command;

use Symfony\Component\Console\Helper\FormatterHelper;
use Symfony\Component\Process\ProcessBuilder;

use Knp\Command\Command as BaseCommand;

/**
 * Application aware command
 *
 * Provide a silex application in CLI context.
 */
class Command extends BaseCommand
{
    protected function runPropelGen($task)
    {
        $trace = '';

        $propelGenScript = sprintf('%s/vendor/bin/propel-gen', $this->getProjectDirectory());
        $propelConfigDir = sprintf('%s/src/Resources/config', $this->getProjectDirectory());

        $builder = new ProcessBuilder(array($propelGenScript, $propelConfigDir, $task));
        $builder->setTimeout(null);
        $builder->getProcess()->run(function ($type, $buffer) use (&$trace) {
            $trace .= $buffer;
        });

        return $trace;
    }
}
