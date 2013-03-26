<?php

/*
 * This file is part of the c2is/silex-bootstrap.
 *
 * (c) Morgan Brunot <brunot.morgan@gmail.com>
 */

namespace Core\Command\Clear;

use Core\Command\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

class CacheCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('clear:cache')
            ->setDescription('Clears cache files')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $cacheDir = sprintf("%s/cache", $this->getProjectDirectory());

        $finder = new Finder();
        $finder
            ->in($cacheDir)
            ->notName('.gitkeep')
        ;

        $filesystem = new Filesystem();
        $filesystem->remove($finder);

        $output->writeln(sprintf("%s <info>success</info>", $this->getName()));

        return true;
    }
}
