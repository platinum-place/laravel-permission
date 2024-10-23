<?php

namespace App\Enums;

use App\Enums\shared\EnumsTrait;

enum ActionEnum: int
{
    use EnumsTrait;

    case viewAny = 1;

    case view = 2;

    case create = 3;

    case update = 4;

    case delete = 5;

    case restore = 6;

    case forceDelete = 7;

    case deleteAny = 8;
}
