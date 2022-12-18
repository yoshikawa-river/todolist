<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $task_service;

    public function __construct(TaskService $task)
    {
        $this->task_service = $task;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Task $task)
    {
        $tasks = $task->fetchAllTasks();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $params = collect($request->input());
        
        if ($request->isBack()) {
            return to_route('task.create')->withInput();
        }

        if ($request->isCreate()) {
            $this->task_service->createTask($params);
            return to_route('task.index');
        }

        return view('tasks.create_confirm', compact('params'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $task = $task->load('user');
        return view('tasks.detail', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, Task $task)
    {
        $params = collect($request->input());
        
        if ($request->isBack()) {
            return to_route('task.edit', $task)->withInput();
        }

        if ($request->isCreate()) {
            $this->task_service->updateTask($params, $task);
            return to_route('task.show', $task);
        }

        return view('tasks.edit_confirm', compact('params', 'task')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}