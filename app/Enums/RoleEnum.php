<?php

namespace App\Enums;

use App\Enums\shared\EnumsTrait;

enum RoleEnum: int
{
    use EnumsTrait;

    case admin = 1;
}
