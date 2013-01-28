<?php

/*
 * This file is part of the c2is/silex-bootstrap.
 *
 * (c) Morgan Brunot <brunot.morgan@gmail.com>
 */

namespace Core\Command\Tests;

use Core\Command\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class UnitsCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('tests:units')
            ->setDescription('Launches units tests')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $atoum     = $this->getProjectDirectory().'/vendor/bin/atoum';
        $unitTests = $this->getProjectDirectory().'/tests';

        passthru(sprintf('%s -d %s', $atoum, $unitTests), $status);

        return $status;
    }
}
