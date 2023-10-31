<?php

namespace App\Domain\Services\DocumentFile;

use App\Domain\Entities\DocumentFile;

interface FileUpload
{
    public function store(DocumentFile $file): DocumentFile;
}
