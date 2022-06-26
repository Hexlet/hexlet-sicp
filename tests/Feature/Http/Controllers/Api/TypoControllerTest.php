<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Tests\ControllerTestCase;

class SolutionControllerTest extends ControllerTestCase
{
    public function testStore(): void
    {
        $data = [
            'pageUrl' => $this->faker->url,
            'reporterName' => $this->faker->name,
            'reporterComment' => $this->faker->text,
            'textBeforeTypo' => $this->faker->text,
            'textTypo' => $this->faker->text,
            'textAfterTypo' => $this->faker->text,
        ];

        Http::fake([
            '*' => Http::response($data, Response::HTTP_CREATED),
        ]);

        $response = $this->postJson(route('api.typos.store'), $data);
        $response->assertCreated();
        $response->assertJson($data);
    }
}
