<?php

namespace App\Observers;

use App\Events\Task\StoredTaskEvent;
use App\Models\Guarantee;
use App\Models\Task;
use Illuminate\Support\Facades\Log;

class TaskObserver
{
    /**
     * Handle the Task "created" event.
     */
    public function created(Task $task): void
    {
        Guarantee::create([
            'task_id' => $task->id,
            'number' => random_int(100000, 999999)
        ]);

//        StoredTaskEvent::dispatch($task);
        Log::channel('task')->info('Успешно создано', ['task' => $task]);
    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
        Log::channel('task')->info('Успешно обновлено', ['task' => $task]);
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        Log::channel('task')->info('Успешно удалено', ['task' => $task]);
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        //
    }
}
