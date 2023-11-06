<?php

namespace App\Domain\Interfaces\Dgt\Documents;

use App\Domain\Entities\DocumentFile;

interface UploadDocument
{
    public function uploadDocument(DocumentFile $documentFile): bool;
}
