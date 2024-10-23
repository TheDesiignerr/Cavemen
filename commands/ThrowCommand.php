<?php

namespace Commands;

require_once 'database/eatItem.php';
require_once 'database/addItem.php';
require_once 'api/imageApi.php';

use Discord\Parts\Channel\Message;
use Discord\Parts\Embed\Embed;

class ThrowCommand
{
    private $discord;

    public function __construct($discord)
    {
        $this->discord = $discord;
    }

    public function execute(Message $message)
    {
        $content = strtolower(trim($message->content));
        $authorUser = $message->author->username;

        if (preg_match('/^cthrow\s+(.+)\s+(\S+)$/', $content, $matches)) {
            $throwItem = ucfirst(strtolower($matches[1])); // The item being thrown
            $throwAtUser = $matches[2]; // The username throwing the item

            if(getItem($authorUser, $throwItem) ) {
                if ($this->caught()) {
                    eatItem($authorUser, $throwItem);
                    addItem($throwAtUser, $throwItem, 1);
                    $this->sendWinEmbed($message, $authorUser, $throwItem, $throwAtUser);
                } else {
                    eatItem($authorUser, $throwItem);
                    $this->sendLoseEmbed($message, $authorUser, $throwItem, $throwAtUser);
                }
            } else {
                $this->sendErrorEmbed($message, $authorUser, $throwItem);
            }
        } else {
            $message->channel->sendMessage("Usage: `cthrow <item> <username>`");
        }
    }

    public function caught()
    {
        return rand(0, 1) === 1;
    }

    public function sendWinEmbed(Message $message, $authorUser, $throwItem, $throwAtUser) {
        $imageLink = 'https://media1.tenor.com/m/MrzDJoH9aPEAAAAd/gigachad-villager.gif';
        $embed = new Embed($this->discord);
        $embed->setTitle("$authorUser threw a $throwItem at $throwAtUser");
        $embed->setDescription("BUT $throwAtUser, CAUGHT IT!!!");
        $embed->setTimestamp(time());
        $embed->setImage($imageLink);
        $embed->setFooter("Thrown by $authorUser");
        $message->channel->sendEmbed($embed);
    }

    public function sendLoseEmbed(Message $message, $authorUser, $throwItem, $throwAtUser) {
        $imageLink = 'https://media1.tenor.com/m/s7DfM7JrkkIAAAAC/songs-of-war-minecraft.gif';
        $embed = new Embed($this->discord);
        $embed->setTitle("$authorUser threw a $throwItem at $throwAtUser");
        $embed->setDescription("womp womp get good $throwAtUser");
        $embed->setTimestamp(time());
        $embed->setImage($imageLink);
        $embed->setFooter("Thrown by $authorUser");
        $message->channel->sendEmbed($embed);
    }

    public function sendErrorEmbed(Message $message, $authorUser, $throwItem) {
        $embed = new Embed($this->discord);
        $embed->setDescription("You don't have enough $throwItem to throw");
        $embed->setTimestamp(time());
        $embed->setImage(getImage('ERR'));
        $message->channel->sendEmbed($embed);
    }
}