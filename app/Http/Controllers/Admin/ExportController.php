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

    public function store(Request $request): BinaryFileResponse
    {
        $request->validate([
            'type' => 'required|string',
        ]);

        $filePath = $this->exporter->export($request->type);

        return response()->download($filePath)->deleteFileAfterSend();
    }
}
