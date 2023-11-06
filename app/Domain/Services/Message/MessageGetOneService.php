<?php

namespace App\Domain\Services\Message;

use App\Domain\Entities\Message;
use App\Domain\Interfaces\Message\MessageRetrieve;

class MessageGetOneService implements MessageRetrieve
{

    public function retrieveAll(): array
    {
        return [];
    }

    public function retrieveById(int $id): ?Message
    {
        return null;
    }

    public function retrieveByCode(string $code): ?Message
    {
        return null;
    }

    public function retrieveByText(string $text): ?Message
    {
        return null;
    }
}
