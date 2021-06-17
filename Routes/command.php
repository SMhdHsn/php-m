<?php

use Core\Classes\CommandLineInterface as CLI;

/*
|--------------------------------------------------------------------------
| Command Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Command routes for your application. 
|
*/

$command->modify('migrate:rollback', 'MigrationCommands@rollback');
$command->modify('migrate', 'MigrationCommands@migrate');

$command->modify('say', function (string $message = 'Hello') {
    return CLI::out($message);
});