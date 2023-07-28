<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number', 'time', 'text'
    ];

    protected $casts = [
        'text' => 'encrypted',
        'time' => 'datetime'
    ];

    public function scopeTableList(Builder $query): void
    {
        $query->select('_id', 'phone_number', 'time');
    }
}
