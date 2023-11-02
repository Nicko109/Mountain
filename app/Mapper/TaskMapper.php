<?php

namespace App\Mapper;

use App\Models\Task;

class TaskMapper
{

    public static function indexTasks($tasks)
    {
        return $tasks->map(function ($task) {
            $task->formatted_deadline = \Carbon\Carbon::parse($task->deadline)->format('d.m.Y');
            $task->formatted_is_finished = $task->is_finished ? 'Выполнено' : 'Не выполнено';
            return $task;
        });
    }

    public static function storeTask(Task $task)
    {
        $task->formatted_deadline = \Carbon\Carbon::parse($task->deadline)->format('d.m.Y');
        $task->formatted_is_finished = $task->is_finished ? 'Выполнено' : 'Не выполнено';

        return $task;
    }

    public static function showTask(Task $task)
    {
        $task->formatted_deadline = \Carbon\Carbon::parse($task->deadline)->format('d.m.Y');
        $task->formatted_is_finished = $task->is_finished ? 'Выполнено' : 'Не выполнено';

        return $task;
    }

}
