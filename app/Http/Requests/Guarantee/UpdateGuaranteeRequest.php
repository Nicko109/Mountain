<?php

namespace App\Http\Requests\Guarantee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGuaranteeRequest extends FormRequest
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
            'number' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'number.required' => 'Это поле необходимо для заполнения',
            'number.integer' => 'Данные должны соответствовать числовому типу',
        ];
    }
}
