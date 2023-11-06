<?php

namespace App\Models;

use App\Domain\Enums\DocumentFileTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'code',
        'text',
    ];

    protected $guarded = [];

    protected $hidden = [
        'dgt_procedures_id'
    ];

    protected $casts = [
        'code' => DocumentFileTypes::class,
        'text' => 'string'
    ];

    public function dgtProcedure(): BelongsTo
    {
        return $this->belongsTo(DgtProcedure::class);
    }
}
