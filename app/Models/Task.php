<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_name',
        'task_description',
        'priority',
        'public',
    ];

    protected $casts = [
        'public' => 'boolean',
    ];

    protected $dates = [
        'due_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}