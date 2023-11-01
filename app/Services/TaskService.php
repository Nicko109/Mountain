<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public static function store(array $data) : Task
    {
        return Task::create($data);
    }

    public static function index()
    {
        return Task::all();
    }


}