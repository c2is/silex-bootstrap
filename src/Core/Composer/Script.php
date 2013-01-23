<?php

/*
 * This file is part of the c2is/silex-bootstrap.
 *
 * (c) Morgan Brunot <brunot.morgan@gmail.com>
 */

namespace Core\Composer;

use Composer\Script\Event;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Console\Output\ConsoleOutput;

class Script
{
    private static $output;

    public static function postInstall(Event $event)
    {
        $fs = new Filesystem();

        self::$output = new ConsoleOutput();

        $appName = self::guessApplicationName();

        self::write(sprintf('guessed application name: <info>%s</info>', $appName));

        self::write('creating your <info>project</info> directory', true);
        $fs->mkdir('src/'.$appName);

        $vars = [
            '%application_name%' => $appName,
            '%normalized_name%' => self::getNormalizedName($appName),
            '%database_name%' => self::getDatabaseName($appName),
        ];

        self::write('updating <info>bootstrap</info>');
        self::render('src/bootstrap.php', $vars);

        self::write('updating <info>propel config</info>');
        self::render('src/Resources/config/build.properties', $vars);
        self::render('src/Resources/config/databases.xml.dist', $vars);
        self::render('src/Resources/config/schema.xml', $vars);

        self::write('creating <info>log file</info>');
        $fs->touch($vars['%normalized_name%'].'.log');
        $fs->chmod($vars['%normalized_name%'].'.log', 0777);

        self::write('removing silex-bootstrap\'s git directory');
        $fs->remove('.git');

        self::write('your application is ready', true);
    }

    private static function render($file, $vars)
    {
        $content = file_get_contents($file);
        $content = strtr($content, $vars);
        file_put_contents($file, $content);
    }

    private static function getNormalizedName($appName)
    {
        return preg_replace('/[^a-z_-]+/', '_', strtolower($appName));
    }

    private static function getDatabaseName($appName)
    {
        return preg_replace('/[^a-z_]+/', '_', strtolower($appName));
    }

    private static function guessApplicationName()
    {
        return basename(getcwd());
    }

    private static function write($message)
    {
        self::$output->write('<info>silex-bootstrap</info>: '.$message, true);
    }
}
