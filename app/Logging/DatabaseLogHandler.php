<?php

namespace App\Logging;

use App\Enums\Log\LogLevelEnum;
use App\Models\Log;
use Monolog\Handler\AbstractProcessingHandler;

class DatabaseLogHandler extends AbstractProcessingHandler
{
    protected function write(array|\Monolog\LogRecord $record): void
    {
        Log::create([
            'level_id' => LogLevelEnum::get(strtolower($record['level_name']))->value,
            'message' => $record['message'] ?? null,
            'context' => $record['context'] ?? null,
        ]);
    }
}
