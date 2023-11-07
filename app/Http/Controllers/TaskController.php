<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Resources\Task\TaskResource;
use App\Mapper\TaskMapper;
use App\Models\Guarantee;
use App\Models\Task;
use App\Services\PerformerService;
use App\Services\TaskService;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tasks = TaskService::index();
        $formattedTasks = TaskMapper::indexTasks($tasks);


        return view('task.index', compact('formattedTasks'));
    }


    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $data = $request->validated();

        $task = TaskService::store($data);

        $guarantee = new Guarantee([
            'number' => random_int(100000, 999999)
        ]);

        $guarantee->task_id = $task->id;

        // Сохраняем гарантию в базе данных
        $guarantee->save();

        $task = TaskMapper::storeTask($task);

        $task = TaskResource::make($task)->resolve();


        return redirect()->route('tasks.index');

    }
    /**
     * Show the form for creating a new resource.
     */
    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {

        $performers = PerformerService::index();
        $task = TaskMapper::showTask($task);

        return view('task.show', compact('task', 'performers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $data = $request->validated();
        TaskService::update($task, $data);
        return redirect()->route('tasks.show', compact('task'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
      TaskService::destroy($task);

        return redirect()->route('tasks.index');
    }
}
