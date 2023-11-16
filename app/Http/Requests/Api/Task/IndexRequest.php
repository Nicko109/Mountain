<?php

namespace App\Http\Requests\Api\Task;

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
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
            'is_finished' => 'nullable|boolean',
            'price_from' => 'nullable|integer',
            'price_to' => 'nullable|integer',
            'category_id' => 'nullable|integer|exists:categories,id',
            'complaint' => 'nullable|string',
            'page' => 'nullable|integer',
            'per_page' => 'nullable|integer',
        ];
    }
}
