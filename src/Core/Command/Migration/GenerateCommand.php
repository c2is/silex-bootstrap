<?php

/*
 * This file is part of the c2is/silex-bootstrap.
 *
 * (c) Morgan Brunot <brunot.morgan@gmail.com>
 */

namespace Core\Command\Migration;

use Core\Command\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('migration:generate')
            ->setDescription('Runs propel migration script')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $trace = $this->runPropelGen('diff');

        if (OutputInterface::VERBOSITY_VERBOSE === $output->getVerbosity()) {
            $output->write($trace);
        }

        $output->writeln(sprintf("%s <info>success</info>", $this->getName()));
    }
}
