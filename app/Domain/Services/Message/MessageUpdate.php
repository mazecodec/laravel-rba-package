<?php

namespace App\Domain\Services\Message;

use App\Domain\Entities\Message;

interface MessageUpdate
{
    public function updateMessage(int $id, Message $message): Message;
}
