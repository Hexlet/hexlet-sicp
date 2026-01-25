<?php

namespace App\DTO\Admin;

use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;

class UpdateUserData extends Data
{
    public function __construct(
        #[Required]
        #[Max(255)]
        public string $name,
        #[Nullable]
        #[Max(255)]
        public ?string $github_name,
        #[Nullable]
        public ?bool $is_admin,
    ) {
    }
}
