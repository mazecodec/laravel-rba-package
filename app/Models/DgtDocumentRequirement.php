<?php

namespace App\Models;

use App\Domain\Enums\DocumentFileTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    protected $guarded = [];

    protected $hidden = [
        'dgt_procedures_id',
    ];

    protected $casts = [
        'code' => DocumentFileTypes::class,
        'file_extension' => 'string',
        'file_max_size' => 'integer',
        'is_additional' => 'boolean',
    ];

    public function dgtProcedure(): BelongsTo
    {
        return $this->belongsTo(DgtProcedure::class);
    }
}
