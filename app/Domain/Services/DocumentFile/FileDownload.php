<?php

namespace App\Domain\Services\DocumentFile;

use App\Domain\Entities\DocumentFile;

interface FileDownload
{
    public function download(int $id): DocumentFile;
}
