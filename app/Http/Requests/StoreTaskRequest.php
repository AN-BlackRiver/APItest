<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'priority_id' => ['nullable', 'exists:priorities,id'],
        ];
    }

    public function attributes(): array{
       return [
           'priority_id' => 'priority',
       ];
    }
}
