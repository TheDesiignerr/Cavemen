<?php

require __DIR__ . '/vendor/autoload.php';
include 'getEnvv.php';
include 'api/mineApi.php';
include 'api/imageApi.php';
include 'database/setItem.php';
include 'database/getItem.php';
include 'database/validateUser.php';
include 'database/giveItem.php';
include 'database/smeltItem.php';
include 'database/eatItem.php';



use Discord\Discord;
use Discord\Parts\Embed\Embed;
use Discord\WebSockets\Event;
use Discord\WebSockets\Intents;
use Discord\Parts\Channel\Message;

// Command classes

use Commands\MineCommand;
use Commands\FishCommand;
use Commands\InvCommand;
use Commands\GiveCommand;
use Commands\MeltCommand;
use Commands\CookCommand;
use Commands\EatCommand;
use Commands\HelpCommand;
use Commands\VoteCommand;
use Commands\InviteCommand;
use Commands\ThrowCommand;
use Commands\UpdatesCommand;

$discord = new Discord([
    'token' => getEnvv(),
    'intents' => Intents::getDefaultIntents() | Intents::GUILD_MEMBERS,
]);


// Load Commands

$commands = [
    'cmine' => MineCommand::class,
    'cfish' => FishCommand::class,
    'cinv' => InvCommand::class,
    'cgive' => GiveCommand::class,
    'cmelt' => MeltCommand::class,
    'ccook' => CookCommand::class,
    'ceat' => EatCommand::class,
    'chelp' => HelpCommand::class,
    'cvote' => VoteCommand::class,
    'cinvite' => InviteCommand::class,
    'cthrow' => ThrowCommand::class,
    'cupdates' => UpdatesCommand::class,
];


$discord->on('ready', function($discord) use ($commands) {
    echo "Bot powered up!", PHP_EOL;

    $discord->on('message', function (Message $message) use ($discord, $commands) {
        if ($message->author->bot) {
            return;
            exit();
        };

        
        $authorUsername = $message->author->username;
        $commandContent = strtolower($message->content);


        // Check for MineCommand
        if (strpos($commandContent, 'cmine') !== false) {
            $commandClass = $commands['cmine'];
            if (class_exists($commandClass)) {
                $command = new $commandClass($discord);
                $command->execute($message);
            } else {
                echo "Command class not found.", PHP_EOL;
            }
            return;
        }


        // Check for ThrowCommand
        if (strpos($commandContent, 'cthrow') !== false) {
            $commandClass = $commands['cthrow'];
            if (class_exists($commandClass)) {
                $command = new $commandClass($discord);
                $command->execute($message);
            } else {
                echo "Command class not found.", PHP_EOL;
            }
            return;
        }


        // Check for FishCommand
        if (strpos($commandContent, 'cfish') !== false) {
            $commandClass = $commands['cfish'];
            if (class_exists($commandClass)) {
                $command = new $commandClass($discord);
                $command->execute($message);
            } else {
                echo "Command class {$commandContent} not found.", PHP_EOL;
            }
            return;
        }


        // Check for InvCommand
        if (strtolower($commandContent) === 'cinv') {
            $commandClass = $commands['cinv'];
            if (class_exists($commandClass)) {
                $command = new $commandClass($discord);
                $command->execute($message);
            } else {
                echo "Command class {$commandContent} not found.", PHP_EOL;
            }
            return;
        }


        // Check for GiveCommand
        if (strpos($commandContent, 'cgive') !== false) {
            $commandClass = $commands['cgive'];
            if (class_exists($commandClass)) {
                $command = new $commandClass($discord);
                $command->execute($message);
            } else {
                echo "Command class {$commandContent} not found.", PHP_EOL;
            }
            return;
        }


        // Check for MeltCommand

        if (strpos($commandContent, 'cmelt') !== false) {
            $commandClass = $commands['cmelt'];
            if (class_exists($commandClass)) {
                $command = new $commandClass($discord);
                $command->execute($message, $authorUsername);
            } else {
                echo "Command class {$commandContent} not found.", PHP_EOL;
            }
            return;
        }


        // Check for CookCommand

        if (strpos($commandContent, 'ccook') !== false) {
            $commandClass = $commands['ccook'];
            if (class_exists($commandClass)) {
                $command = new $commandClass($discord);
                $command->execute($message, $authorUsername);
            } else {
                echo "Command class {$commandContent} not found.", PHP_EOL;
            }
            return;
        }
        

       // Check for EatCommand

       if (strpos($commandContent, 'ceat') !== false) {
        $commandClass = $commands['ceat'];
        if (class_exists($commandClass)) {
            $command = new $commandClass($discord);
            $command->execute($message, $authorUsername);
        } else {
            echo "Command class {$commandContent} not found.", PHP_EOL;
        }
        return;
        }

        

        // Check for HelpCommand

        if (strpos($commandContent, 'chelp') !== false) {
            $commandClass = $commands['chelp'];
            if (class_exists($commandClass)) {
                $command = new $commandClass($discord);
                $command->execute($message, $authorUsername);
            } else {
                echo "Command class {$commandContent} not found.", PHP_EOL;
            }
            return;
        }

         // Check for HelpCommand

       if (strpos($commandContent, 'ch') !== false) {
            $commandClass = $commands['chelp'];
            if (class_exists($commandClass)) {
                $command = new $commandClass($discord);
                $command->execute($message, $authorUsername);
            } else {
                echo "Command class {$commandContent} not found.", PHP_EOL;
            }
            return;
        }

         // Check for InviteCommand

       if (strpos($commandContent, 'cinvite') !== false) {
        $commandClass = $commands['cinvite'];
        if (class_exists($commandClass)) {
            $command = new $commandClass($discord);
            $command->execute($message, $authorUsername);
        } else {
            echo "Command class {$commandContent} not found.", PHP_EOL;
        }
        return;
        }

          // Check for VoteCommand

       if (strpos($commandContent, 'cvote') !== false) {
        $commandClass = $commands['cvote'];
        if (class_exists($commandClass)) {
            $command = new $commandClass($discord);
            $command->execute($message, $authorUsername);
        } else {
            echo "Command class {$commandContent} not found.", PHP_EOL;
        }
        return;
        }

          // Check for VoteCommand

       if (strpos($commandContent, 'cupdates') !== false) {
        $commandClass = $commands['cupdates'];
        if (class_exists($commandClass)) {
            $command = new $commandClass($discord);
            $command->execute($message, $authorUsername);
        } else {
            echo "Command class {$commandContent} not found.", PHP_EOL;
        }
        return;
        }
        
    });
});

$discord->run();