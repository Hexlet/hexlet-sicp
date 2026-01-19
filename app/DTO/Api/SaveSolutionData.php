<?php

namespace App\DTO\Api;

use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class SaveSolutionData extends Data
{
    public function __construct(
        #[Required]
        #[Min(1)]
        public int $user_id,
        #[Required]
        public string $solution_code,
    ) {
    }
}
