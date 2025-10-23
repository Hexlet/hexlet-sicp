<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     */
    public const MAX_CONTENT_LENGTH = 500;

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $maxLength = self::MAX_CONTENT_LENGTH;

        return [
            'commentable_type' => 'required|string',
            'commentable_id' => 'required|min:1',
            'content' => "required|string|min:1|max:{$maxLength}",
            'parent_id' => 'sometimes|exists:comments,id',
        ];
    }
}
