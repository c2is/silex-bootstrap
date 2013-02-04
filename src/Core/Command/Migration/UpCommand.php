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

class UpCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('migration:up')
            ->setDescription('Runs propel migration script')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $trace = $this->runPropelGen('status');

        preg_match("/\[propel-migration-status\] ([1-9*]) migrations? needs? to be executed/", $trace, $matches);

        $migrationToRun = 0;
        if (count($matches) > 1) {
            $migrationToRun = (int) $matches[1];
        }

        file_put_contents(sprintf("%s/migrations", $this->getProjectDirectory()), $migrationToRun);
        $output->writeln(sprintf("%s <info>%s migration(s)</info>", $this->getName(), $migrationToRun));

        $trace = $this->runPropelGen('migrate');
        if (OutputInterface::VERBOSITY_VERBOSE === $output->getVerbosity()) {
            $output->write($trace);
        }

        $output->writeln(sprintf("%s <info>success</info>", $this->getName()));
    }
}
