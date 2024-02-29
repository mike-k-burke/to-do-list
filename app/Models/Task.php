<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'task',
        'completed_at'
    ];

    protected $casts = [
        'completed_at' => 'datetime'
    ];

    public static function boot(): void
    {
        parent::boot();

        static::creating(function (self $record) {
            $record->setAttribute('user_id', Auth::user()->id);
        });
    }
}
