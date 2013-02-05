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

class FeaturesCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('tests:features')
            ->setDescription('Launches features tests')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $behat       = $this->getProjectDirectory().'/vendor/bin/behat';
        $configTests = $this->getProjectDirectory().'/tests/behat.yml';

        passthru(sprintf('%s --config %s --ansi', $behat, $configTests), $status);

        return $status;
    }
}
