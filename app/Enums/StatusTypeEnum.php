<?php

declare(strict_types = 1);

namespace App\Enums;

enum StatusTypeEnum: int
{
    case DRAFT = 0;
    case SHOW = 1;
    case DENIED = 2;
}
