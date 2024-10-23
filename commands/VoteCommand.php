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
        $inviteLink = 'https://discord.com/oauth2/authorize?client_id=1296894207750967419&scope=bot&permissions=274878254080';
        $message->channel->sendMessage($inviteLink);
    }
}