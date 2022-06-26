<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class TypoController extends Controller
{
    public function store(Request $request): Response
    {
        $data = $request->validate([
            'pageUrl' => 'required|url',
            'reporterName' => 'required|string',
            'reporterComment' => 'nullable|string',
            'textBeforeTypo' => 'nullable|string',
            'textTypo' => 'required|string',
            'textAfterTypo' => 'nullable|string',
        ]);

        $url = config('correction.url') . '/api/workspaces/hexlet-sicp/typos';
        $token = config('correction.token');
        $response = Http::withToken($token, 'Token')->post($url, $data);

        return response($response->body(), $response->status());
    }
}
