<?php

namespace App\DTO\Settings;

use Illuminate\Validation\Rule;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class ProfileUpdateData extends Data
{
    public function __construct(
        #[Required]
        #[Min(2)]
        #[Max(255)]
        public string $name,
        #[Nullable]
        #[Min(2)]
        #[Max(255)]
        public ?string $github_name = null,
    ) {
    }

    public static function rules(): array
    {
        return [
            'github_name' => [
                Rule::unique('users')->ignore(auth()->id()),
            ],
        ];
    }
}
