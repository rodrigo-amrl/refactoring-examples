<?php

namespace App\CatalogRefactoring\IntroduceParameterObject;

class NumberRange
{
    public function __construct(
        private  int $min,
        private int $max
    ) {
    }

    public function getMin(): int
    {
        return $this->min;
    }
    public function getMax(): int
    {
        return $this->max;
    }
    public function contains($temperature): bool
    {
        return $temperature >= $this->getMin() && $temperature <= $this->getMax();
    }
}
