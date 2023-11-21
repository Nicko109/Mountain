<?php

namespace App\Exceptions\Task;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ShowException extends Exception
{
    /**
     * Report the exception.
     */
    public function report(): void
    {
        Log::channel('task')->error('Ошибка показа обьекта from Exception');
    }

    /**
     * Render the exception into an HTTP response.
     */
    public function render(Request $request): Response
    {
        return response(['message' => 'some error']);
    }

    public static function ERROR()
    {
        return new self('Ошибка показа обьекта');
    }
}
