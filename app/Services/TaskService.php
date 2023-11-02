<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{

    public static function index()
    {
        return Task::all();
    }

    public static function store(array $data) : Task
    {
        $data['is_finished'] = !empty($data['is_finished']);
        return Task::create($data);
    }


    public static function update(Task $task, array $data)
    {
        $data['is_finished'] = !empty($data['is_finished']);

        return $task->update($data);
    }

    public static function destroy(Task $task)
    {
        return $task->delete();
    }


}
