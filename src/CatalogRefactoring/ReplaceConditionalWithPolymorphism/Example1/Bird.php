<?php


namespace App\CatalogRefactoring\ReplaceConditionalWithPolymorphism\Example1;


class Bird
{
    public function __construct(
        protected array $bird
    ) {
    }

    public function getPlumage()
    {
        return "unknown";
    }
    public function getAirSpeedVelocity()
    {
        return null;
    }
}
