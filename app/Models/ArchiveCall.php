<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class ArchiveCall extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number', 'time', 'text'
    ];

    protected $casts = [
        'text' => 'encrypted',
    ];
}
