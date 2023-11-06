<?php

namespace App\Models;

use App\Domain\Enums\ProcedureType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DgtProcedure extends Model
{
    use HasFactory;

    protected $table = 'dgt_procedures';

    protected $fillable = [
        'type',
        'status',
        'status_sigadocs',
    ];

    protected $guarded = [];

    protected $casts = [
        'type' => ProcedureType::class,
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function dgtDocumentRequirements(): HasMany
    {
        return $this->hasMany(DgtDocumentRequirement::class);
    }
}
