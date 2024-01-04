<?php

namespace App\CatalogRefactoring\ReplacePrimitiveWithObject\Refactored;

use Exception;

class Priority
{

    const LEGAL_VALUES = ['low', 'normal', 'high', 'rush'];
    private string $value;
    public function __construct($value)
    {
        if ($value instanceof Priority) return $value;
        if (!in_array($value, self::LEGAL_VALUES)) throw new Exception("{$value} is invalid for Priority");

        $this->value = $value;
    }
    public function toString()
    {
        return $this->value;
    }
}
