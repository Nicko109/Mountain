<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'deadline' => 'nullable|date|after_or_equal:today',
            'is_finished' => 'nullable|string',
            'price' => 'nullable|integer',
            'category_id' => 'nullable|integer|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Данные должны соответствовать строчному типу',
            'description.required' => 'Это поле необходимо для заполнения',
            'description.string' => 'Данные должны соответствовать строчному типу',
            'deadline.date' => 'Данные должны соответствовать дате',
            'deadline.after_or_equal' => 'Дата не может быть раньше сегодняшней',
        ];
    }
}
