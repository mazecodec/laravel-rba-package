<?php

namespace App\Domain\Services\Message;

use App\Domain\Entities\Message;

interface MessageRetrieve
{
    public function retrieve(int $id): Message;
}
