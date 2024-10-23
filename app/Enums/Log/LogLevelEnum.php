<?php

namespace App\Enums\Log;

use App\Enums\shared\EnumsTrait;

enum LogLevelEnum: int
{
    use EnumsTrait;

    case emergency = 1;

    case alert = 2;

    case critical = 3;

    case error = 4;

    case warning = 5;

    case notice = 6;

    case info = 7;

    case debug = 8;
}
