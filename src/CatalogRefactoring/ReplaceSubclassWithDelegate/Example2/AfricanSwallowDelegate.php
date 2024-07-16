<?php


namespace App\CatalogRefactoring\ReplaceSubclassWithDelegate\Example2;


class AfricanSwallowDelegate
{
    private int $number_of_coconuts;

    public function __construct($data)
    {
        $this->number_of_coconuts = $data->number_of_coconuts;
    }

    public function airSpeedVelocity()
    {
        return 40 - 2 * $this->number_of_coconuts;
    }
}
