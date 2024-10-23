<?php

namespace App\Enums;

use App\Enums\shared\EnumsTrait;

enum ModelEnum: int
{
    use EnumsTrait;

    case user = 1;
}
