<?php

namespace App\DTO\Admin;

use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;

class ExportData extends Data
{
    public function __construct(
        #[Required]
        #[StringType]
        public string $type,
    ) {
    }
}
