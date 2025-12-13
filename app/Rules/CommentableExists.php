<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class CommentableExists implements ValidationRule, DataAwareRule
{
    protected array $data = [];

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $commentableType = $this->data['commentable_type'] ?? null;

        if (!$commentableType || !class_exists($commentableType)) {
            $fail(__('validation.custom.commentable_id.invalid_type'));
            return;
        }

        try {
            $exists = $commentableType::where('id', $value)->exists();

            if (!$exists) {
                $fail(__('validation.custom.commentable_id.exists'));
            }
        } catch (\Exception $e) {
            $fail(__('validation.custom.commentable_id.invalid_type'));
        }
    }
}
