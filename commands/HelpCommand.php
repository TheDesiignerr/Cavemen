<?php

namespace Commands;

require_once 'database/getTotalUsers.php';

use Discord\Parts\Channel\Message;
use Discord\Parts\Embed\Embed;

class HelpCommand
{
    private $discord;

    public function __construct($discord)
    {
        $this->discord = $discord;
    }

    public function execute(Message $message, $authorUsername)
    {
        if (strtolower(trim($message->content)) === 'chelp' || strtolower(trim($message->content)) === 'ch') {
            $this->sendHelpEmbed($message, $authorUsername);
        }
    }

    private function sendHelpEmbed(Message $message, $authorUsername)
    {
        $embed = new Embed($this->discord);
        $embed->setTitle("Bot Commands");
        $embed->setDescription($this->getHelpDescription($authorUsername));
        $embed->setFooter('Requested by ' . $authorUsername);
        $embed->setTimestamp(time());
        $embed->setColor(0x1c1c1c);
        $message->channel->sendEmbed($embed);
    }

    public function getHelpDescription($authorUsername)
    {
        return "
        **:robot: ┆ Bot Prefix**
        **`c`**
        *example: chelp*

        **:pick: ┆ Mine Items**
        **`cmine`**
        *mine a random block*
        **Hey {$authorUsername}, Get started using this command! :up_arrow:**

        **:backpack: ┆ Check status**
        *view your inventory*
        **`cinv`**
        **`cinv {user}`**
        *example: cinv desiignerr*

        **:palm_up_hand: ┆ Give Items**
        *give other users items*
        **`cgive`**
        **`cgive {user} {item_name} {amount}`**
        *example: cgive desiignerr poppy 6*

        **<:furnace:1297611381931245573> ┆ Furnace Commands**
        *use the furnace item*
        **`cmelt`**
        **`cmelt {item_name} {amount}`**
        *example: cmelt iron 5*
        **`ccook`**
        **`ccook {item_name} {amount}`**
        *example: ccook salmon 7*

        **<:fishing_rod:1297614225677750392> ┆ Fishing rod Commands**
        *use the fishing rod item*
        **`cfish`**

        **<:throwables:1298432758934278164> ┆ Throwable item Commands**
        *for throwable items only*
        **`cthrow`**
        **`cthrow {item_name} {at_username}`**
        *example: cthrow snowball desiignerr*

        **:apple: ┆ Eating**
        *eat edible items*
        **`ceat`**
        **`ceat {item_name}`**
        *example: ceat salmon*

        **:dizzy: ┆ Bot Support**
        *Bot invite link*
        **`cinvite`**

        *Updates log*
        **`cupdates`**

        **:memo: ┆ Credits**
        **`Bot Developer` @desiignerr**
        **`Bot Hoster` @niguita**
        **`Bot Language` PHP**
        **`Bot Version` v1.2**
        **`Bot Database` MySQL**
        **`Current Users` {$this->loadUsers()}**
        *More Updates soon!*
        ";
    }

    public function loadUsers() 
    {
        
        $userCount = \getTotalUsers(); // Use the global namespace
        return $userCount;
    }
}