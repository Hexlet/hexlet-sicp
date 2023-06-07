<?php

namespace App\Http\Requests\Api\Exercise;

use Illuminate\Foundation\Http\FormRequest;

class SaveSolutionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // @example 1
            'user_id' => 'required|integer',
            // @example (println "Hello, World!")
            'solution_code' => 'required|string',
        ];
    }
}
