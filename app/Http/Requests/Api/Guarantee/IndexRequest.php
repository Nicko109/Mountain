<?php

namespace App\Http\Requests\Api\Guarantee;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'nullable|integer',
            'title' => 'nullable|string',
            'number' => 'nullable|integer',
            'task_id' => 'nullable|integer|exists:tasks,id',
            'page' => 'nullable|integer',
            'per_page' => 'nullable|integer',
        ];
    }
}
