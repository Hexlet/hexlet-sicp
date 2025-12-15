<?php

namespace App\Http\Controllers\Admin;

use App\Services\AnalyticsExporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportController extends AdminController
{

    public function __construct(
        private readonly AnalyticsExporter $exporter
    ) {
    }

    public function index(Request $request): View
    {
        return view('admin.export');
    }

    public function export(Request $request): BinaryFileResponse
    {
        $request->validate([
            'type' => 'required|string',
        ]);

        $directory = 'exports/' . now()->format('Y-m-d_H-i-s');

        Storage::makeDirectory($directory);

        $this->exporter->export($directory, $request->type);

        $fileName = "{$request->type}.csv";
        $filePath = storage_path("app/{$directory}/{$fileName}");

        return response()->download($filePath)->deleteFileAfterSend();
    }
}
