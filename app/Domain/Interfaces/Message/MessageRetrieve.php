<?php

namespace App\Domain\Interfaces\Message;

use App\Domain\Entities\Message;

interface MessageRetrieve
{
    public function retrieveAll(): array;
    public function retrieveById(int $id): ?Message;
    public function retrieveByCode(string $code): ?Message;
    public function retrieveByText(string $text): ?Message;
}
