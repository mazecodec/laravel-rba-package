<?php

namespace App\Domain\Interfaces\Dgt\Documents;

use App\Domain\Entities\DocumentFile;

interface IsDocumentQualify
{
    public function qualify(DocumentFile $document): bool;
}
