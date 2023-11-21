<?php

namespace App\Http\Controllers\ApiMount;

use App\Http\Controllers\Controller;
use App\Http\Filters\TaskFilter;
use App\Http\Requests\Api\Task\IndexRequest;
use App\Http\Requests\StoreTaskPerformerRequest;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Resources\Task\TaskResource;
use App\Mapper\TaskMapper;
use App\Models\Guarantee;
use App\Models\Performer;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {

        $data = $request->validated();
        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 15;

        $filter = app()->make(TaskFilter::class, ['queryParams' => $data]);


        $tasks = Task::filter($filter)->paginate($perPage, ['*'], 'page', $page);
        $formattedTasks = TaskMapper::indexTasks($tasks);

        Log::channel('task')->info('Список успешно показан');
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

        return redirect()->route('api.mount.tasks.index');
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
