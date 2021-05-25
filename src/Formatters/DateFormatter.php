<?php

declare(strict_types=1);

namespace PoP\EngineWP\Formatters;

use PoP\Engine\Formatters\DateFormatterInterface;

class DateFormatter implements DateFormatterInterface
{
    public function format(string $format, string $date): string | int | false {
        return mysql2date($format, $date);
    }
}
