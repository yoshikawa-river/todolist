<?php

namespace Database\Seeders;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->truncate();
        
        DB::table('tasks')->insert([
            'task_name' => 'タスク一つ目',
            'task_description' => 'タスク説明',
            'priority' => 1,
            'public' => true,
            'due_date' => new Carbon('2022-12-06')
        ]);

        Task::factory()->count(10)->create();
    }
}