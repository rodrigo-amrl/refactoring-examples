<?php

namespace App\CatalogRefactoring\ReplacePrimitiveWithObject\Refactored;


class Order
{

    public function __construct(private Priority $priority)
    {
    }
    public function getPriority()
    {
        return $this->priority;
    }
    public function getPriorityString()
    {
        return $this->priority->toString();
    }
    public function setPriority($priority)
    {
        $this->priority = new Priority($priority);
    }
}
