<?php


namespace App\CatalogRefactoring\ReplaceConditionalWithPolymorphism\Example1;


class AfricanSwallow extends Bird
{
    public function getPlumage()
    {
        return $this->bird['number_of_coconuts'] > 2 ? "tired" : "average";
    }
    public function getAirSpeedVelocity()
    {
        return 40 - 2 * $this->bird['number_of_coconuts'];
    }
    
}
