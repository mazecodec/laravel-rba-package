<?php

namespace App\Domain\Services\Message;

use App\Domain\Entities\Message;
use App\Domain\Interfaces\Message\MessageStore;

class MessageAddNewService implements MessageStore
{

    public function storeMessage(Message $message): ?Message
    {
        return null;
    }
}
