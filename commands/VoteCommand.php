<?php

namespace Commands;

use Discord\Parts\Channel\Message;

class VoteCommand
{
    public function execute(Message $message)
    {
        if (strtolower(trim($message->content)) === 'cvote') {
            $this->sendVoteLink($message);
        }
    }

    private function sendVoteLink(Message $message)
    {
        $inviteLink = "https://top.gg/bot/1296894207750967419#reviews \n https://discordbotlist.com/bots/cavemen/upvote";
        $message->channel->sendMessage($inviteLink);
    }
}