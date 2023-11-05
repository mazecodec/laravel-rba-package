<?php

namespace App\Models;

use App\Domain\Enums\DocumentFileTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'code',
        'text',
    ];

    protected $hidden = [
        'dgt_process_id'
    ];

    protected $casts = [
        'code' => DocumentFileTypes::class,
        'text' => 'string'
    ];
}
