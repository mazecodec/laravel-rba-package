<?php

namespace App\Domain\Interfaces\Dgt\Documents;

use App\Domain\Entities\DocumentFile;

interface DownloadDocument
{
    /**
     * @return DocumentFile[]
     */
    public function downloadAll(): array;
    public function downloadById(int $id): ?DocumentFile;
    public function downloadByName(string $name): ?DocumentFile;
}
