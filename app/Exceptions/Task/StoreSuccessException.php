<?php

namespace App\Exceptions\Task;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class StoreSuccessException extends Exception
{
    /**
     * Report the exception.
     */
    public function report(): void
    {
        Log::channel('task')->info('Успешно создана from Exception');
    }

    /**
     * Render the exception into an HTTP response.
     */
    public function render(Request $request): Response
    {
        return response(['message' => 'success']);
    }

    public static function SUCCESS($task)
    {
        if ($task->wasRecentlyCreated) {
            throw new self('Успешно создано');
        }
    }
}
