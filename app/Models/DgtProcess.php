<?php

namespace App\Models;

use App\Domain\Enums\ProcedureType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DgtProcess extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'status',
        'status_sigadocs',
    ];

    protected $casts = [
        'type' => ProcedureType::class,
    ];
}
