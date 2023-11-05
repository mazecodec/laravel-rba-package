<?php

namespace App\Models;

use App\Domain\Enums\DocumentFileTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DgtDocumentRequirement extends Model
{
    use HasFactory;

    protected $table = 'dgt_document_requirements';

    protected $fillable = [
        'code',
        'file_extension',
        'file_max_size',
        'is_additional',
    ];

    protected $hidden = [
        'dgt_process_id',
    ];

    protected $casts = [
        'code' => DocumentFileTypes::class,
        'file_extension' => 'string',
        'file_max_size' => 'integer',
        'is_additional' => 'boolean',
    ];
}
