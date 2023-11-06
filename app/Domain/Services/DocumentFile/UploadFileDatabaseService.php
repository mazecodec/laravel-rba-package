<?php

namespace App\Domain\Services\DocumentFile;

use App\Domain\Entities\DocumentFile;
use App\Domain\Interfaces\Dgt\Documents\UploadDocument;

class UploadFileDatabaseService implements UploadDocument
{
    public function uploadDocument(DocumentFile $documentFile): bool
    {
        return true;
    }
}
