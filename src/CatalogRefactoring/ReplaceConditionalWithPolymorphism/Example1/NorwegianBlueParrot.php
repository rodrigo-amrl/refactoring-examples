<?php


namespace App\CatalogRefactoring\ReplaceConditionalWithPolymorphism\Example1;


class NorwegianBlueParrot extends Bird
{
    public function getPlumage()
    {
        return $this->bird['voltage'] > 100 ? 'scorched' : "beautiful";
    }
    public function getAirSpeedVelocity()
    {
        return $this->bird['is_nailed'] ? 0 : 10 + $this->bird['voltage'] / 10;
    }
}
