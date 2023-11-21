<?php

namespace App\Http\Controllers\Api;

use App\Events\Task\StoredTaskEvent;
use App\Exceptions\Task\ShowException;
use App\Exceptions\Task\StoreSuccessException;
use App\Http\Controllers\Controller;
use App\Http\Filters\TaskFilter;
use App\Http\Requests\Api\Task\IndexRequest;
use App\Http\Requests\StoreTaskPerformerRequest;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Resources\Task\TaskResource;
use App\Jobs\Task\StoreJob;
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

//                try {
////
////
//            $task = Task::find(150);
//            if (!$task) {
//            throw ShowException::ERROR();
//            }
//        } catch (ShowException $exception) {
//            dd($exception->getMessage());
//        }

        $data = $request->validated();
        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 15;
//        return response()->json($data);
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


//        $task = StoreJob::dispatch($data)->onQueue('tasks');
        $task = TaskService::store($data);

//       StoreSuccessException::SUCCESS($task);


        $task = TaskMapper::storeTask($task);
        StoredTaskEvent::dispatch($task);


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

        Log::channel('task')->info('Успешно показано', ['task' => $task]);
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
