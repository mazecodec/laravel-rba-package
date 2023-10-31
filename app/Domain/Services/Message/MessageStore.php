<?php

namespace App\Domain\Services\Message;

use App\Domain\Entities\Message;

interface MessageStore
{
    public function storeMessage(Message $message): Message;
}
