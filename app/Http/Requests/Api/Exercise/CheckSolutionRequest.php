<?php

namespace App\Http\Requests\Api\Exercise;

use Illuminate\Foundation\Http\FormRequest;

class CheckSolutionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'nullable|integer',
            'solution_code' => 'required|string',
        ];
    }
}
