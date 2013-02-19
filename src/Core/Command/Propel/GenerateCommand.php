<?php

/*
 * This file is part of the c2is/silex-bootstrap.
 *
 * (c) Guillaume Manen <guillaume.manen@gmail.com>
 */

namespace Core\Command\Propel;

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
            ->setName('propel:generate')
            ->setDescription('Runs propel generate script')
            ->setDefinition(array(
                new InputArgument('task', InputArgument::OPTIONAL, 'Taskname', 'main'),
            ))
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $trace = $this->runPropelGen($input->getArgument('task'));

        if (OutputInterface::VERBOSITY_VERBOSE === $output->getVerbosity()) {
            $output->write($trace);
        }

        $output->writeln(sprintf("%s <info>success</info>", $this->getName()));
    }
}
