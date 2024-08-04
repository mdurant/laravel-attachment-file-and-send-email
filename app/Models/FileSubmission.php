<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'file_path',
        'email_sent',
        'email_sent_at',
    ];
}
