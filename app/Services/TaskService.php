<?php

namespace App\Services;

use App\Models\Tag;
use App\Models\Task;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TaskService
{
    public function createTask(Collection $params)
    {
        DB::transaction(function () use($params) {
            $task = new Task();
            $task = $task->create($params->toArray());

            $tags = $params->get('tags');
            $task->tags()->createMany($tags);

        });
    }

    public function updateTask(Collection $params, Task $task)
    {
        DB::transaction(function () use($params, $task) {
            $task->fill($params->toArray())->save();

            $param_tags = $params->get('tags');
            
            foreach ($params->get('tags') as $value) {
                if (is_null($value['id'])) {
                    unset($value['id']);
                    $task->tags()->create($value);
                } else {
                    $tag = Tag::find($value['id']);
                    unset($value['id']);
                    $tag->fill($value)->save();
                }
            }
            
        });
    }
}