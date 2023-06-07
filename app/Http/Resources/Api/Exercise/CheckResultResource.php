<?php

namespace App\Http\Resources\Api\Exercise;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property \App\Services\CheckResult $resource
 */
class CheckResultResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'exit_code' => $this->resource->exitCode,
            'result_status' => $this->resource->getResultStatus(),
            'output' => $this->resource->getOutput(),
        ];
    }
}
