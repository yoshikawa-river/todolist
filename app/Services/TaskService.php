<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TaskService
{
    public function createTask(Collection $params)
    {
        DB::transaction(function () use($params) {
            $task = new Task();
            $task->create($params->toArray());
        });
    }
}