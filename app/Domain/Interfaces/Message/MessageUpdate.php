<?php

namespace App\Domain\Interfaces\Message;

use App\Domain\Entities\Message;

interface MessageUpdate
{
    public function updateMessage(int $id, Message $message): Message;
}
