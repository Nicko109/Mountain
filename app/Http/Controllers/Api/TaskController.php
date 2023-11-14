<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskPerformerRequest;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Resources\Task\TaskResource;
use App\Mapper\TaskMapper;
use App\Models\Guarantee;
use App\Models\Performer;
use App\Models\Task;
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

        $tasks = TaskResource::collection($tasks)->resolve();
        return $tasks;
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


        return $task;
    }
    /**
     * Show the form for creating a new resource.
     */
    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $task = TaskMapper::showTask($task);


        $task = TaskResource::make($task)->resolve();

        return $task;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $data = $request->validated();
        TaskService::update($task, $data);

        $task = TaskMapper::storeTask($task);

        $task = TaskResource::make($task)->resolve();
        return $task;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        TaskService::destroy($task);

        return redirect()->route('api.tasks.index');
    }

    public function storeTaskPerformer(StoreTaskPerformerRequest $request, Task $task)
    {

        $data = $request->validated();

        foreach ($data['performer_ids'] as $performerId) {
            $task->performers()->syncWithoutDetaching($performerId);
        }
        return $task;
    }

}
