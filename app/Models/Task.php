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
        'user_id',
        'priority',
        'public',
        'due_date'
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

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'task_tag', 'task_id', 'tag_id')->withTimestamps();
    }

    public function fetchAllTasks() {
        return $this->with('user')->get();
    }
}