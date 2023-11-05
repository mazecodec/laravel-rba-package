<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDocument extends Model
{
    use HasFactory;

    protected $table = 'user_documents';

    protected $fillable = [
        'name',
        'type',
        'extension',
        'path',
        'size',
        'status',
    ];

    protected $hidden = [
        'signed_at',
        'uploaded_by',
        'signed_by',
        'dgt_process_id',
        'dgt_document_requirements_id',
    ];

    protected $casts = [
        'name' => 'string',
        'type' => 'string',
        'extension' => 'string',
        'path' => 'string',
        'size' => 'integer',
        'status' => 'string',
        'uploaded_at' => 'immutable_datetime',
        'signed_at' => 'immutable_datetime',
        'uploaded_by' => 'integer',
        'dgt_process_id' => 'integer',
        'dgt_document_requirements_id' => 'integer',
        'dgt_document_requirements_id',
    ];
}
