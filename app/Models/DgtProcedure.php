<?php

namespace App\Models;

use App\Domain\Enums\ProcedureType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DgtProcedure extends Model
{
    use HasFactory;

    protected $table = 'dgt_processes';

    protected $fillable = [
        'type',
        'status',
        'status_sigadocs',
    ];

    protected $casts = [
        'type' => ProcedureType::class,
    ];
}
