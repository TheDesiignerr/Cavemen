<?php

namespace Commands;

use Discord\Parts\Channel\Message;
use Discord\Parts\Embed\Embed;

class UpdatesCommand
{
    private $discord;

    public function __construct($discord)
    {
        $this->discord = $discord; // Initialize the discord property
    }

    public function execute(Message $message)
    {
        $content = strtolower(trim($message->content));
        $authorUser = $message->author->username;

        if ($content === 'cupdates') {
            $this->sendUpdatesEmbed($message);
        } else {
            $message->channel->sendMessage("`Something went wrong`");
        }
    }

    public function sendUpdatesEmbed(Message $message) {
        $embed = new Embed($this->discord); // Now $this->discord is initialized
        $embed->setTitle("Updates log");
        $embed->setDescription("
        ```

        Version v1.1

        Added New Item (Snowball)
        Added New Item (Egg)
        Added New Command (cthrow)
        New Rolling algorithm
        ```
        ");

        $message->channel->sendEmbed($embed); // Send the embed message
    }
}