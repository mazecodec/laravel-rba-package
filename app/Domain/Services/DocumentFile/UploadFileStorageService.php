<?php

namespace App\Domain\Services\DocumentFile;

use App\Domain\Entities\DocumentFile;
use App\Domain\Interfaces\Dgt\Documents\DownloadDocument;

class UploadFileStorageService implements DownloadDocument
{

    public function downloadAll(): array
    {
        return [];
    }

    public function downloadById(int $id): ?DocumentFile
    {
        return null;
    }

    public function downloadByName(string $name): ?DocumentFile
    {
        return null;
    }
}
