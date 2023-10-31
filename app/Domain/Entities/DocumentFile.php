<?php

namespace App\Domain\Entities;

use App\domain\Enums\StatusType;

class DocumentFile
{
    private string $name;
    private string $type;
    private string $path;
    private string $extension;
    private StatusType $status;

    private \DateTimeImmutable $uploaded_at;
    private \DateTimeImmutable $signed_at;
    private \DateTimeImmutable $processed_at;
    private \DateTimeImmutable $created_at;
    private \DateTimeImmutable $updated_at;
    private \DateTimeImmutable $deleted_at;

    private User $uploaded_by;
    private Procedure $procedure;
    private DgtRequirements $dgt_requirements;
}
