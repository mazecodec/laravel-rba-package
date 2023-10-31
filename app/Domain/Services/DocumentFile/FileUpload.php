<?php

namespace App\Domain\Services\DocumentFile;

use App\Domain\Entities\DocumentFile;

/**
 * https://livewire.laravel.com/docs/uploads
 */
interface FileUpload
{
    public function store(DocumentFile $file): DocumentFile;
}
