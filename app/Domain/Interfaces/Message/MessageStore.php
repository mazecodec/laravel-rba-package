<?php

namespace App\Domain\Interfaces\Message;

use App\Domain\Entities\Message;

interface MessageStore
{
    public function storeMessage(Message $message): ?Message;
}
