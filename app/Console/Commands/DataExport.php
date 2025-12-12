<?php

namespace App\Console\Commands;

use App\Services\AnalyticsExporter;
use Illuminate\Console\Command;

class DataExport extends Command
{
    protected $signature = 'app:data-export {--path=analytics_export}';
    protected $description = 'Export analytical data from Eloquent models into CSV files';

    public function __construct(
        private readonly AnalyticsExporter $exporter
    ) {
        parent::__construct();
    }

    public function handle(): int
    {
        $directory = $this->option('path');

        $this->exporter->export($directory);

        $this->info("Экспорт завершён: storage/app/{$directory}");

        return self::SUCCESS;
    }
}
