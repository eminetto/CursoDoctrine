<?php
/**
   * Script para rodar as Migrations
 */

use Symfony\Component\Console;
use Doctrine\DBAL\Migrations\MigrationsVersion;
use Doctrine\DBAL\Migrations\Tools\Console\Command as MigrationsCommand;

require __DIR__.'/vendor/autoload.php';

// Inicia a aplicação de linha de comando
$cli = new Console\Application('Doctrine Migrations', MigrationsVersion::VERSION());
$cli->setCatchExceptions(true);

$helperSet = require __DIR__.'/cli-config.php';
$helperSet->set(new Console\Helper\DialogHelper(), 'dialog');
$cli->setHelperSet($helperSet);

// Adiciona os comandos das Migrations
$commands = array();
$commands[] = new MigrationsCommand\ExecuteCommand();
$commands[] = new MigrationsCommand\GenerateCommand();
$commands[] = new MigrationsCommand\LatestCommand();
$commands[] = new MigrationsCommand\MigrateCommand();
$commands[] = new MigrationsCommand\StatusCommand();
$commands[] = new MigrationsCommand\VersionCommand();
$commands[] = new MigrationsCommand\DiffCommand();

$cli->addCommands($commands);

// Run!
$cli->run();