<?php

use App\CatalogRefactoring\SplitVariable\DiscountOld;
use App\CatalogRefactoring\SplitVariable\DiscountRefactored;
use App\CatalogRefactoring\SplitVariable\DistanceTravelOld;
use App\CatalogRefactoring\SplitVariable\DistanceTravelRefactored;
use PHPUnit\Framework\TestCase;

final class SplitVariableTest extends TestCase
{


    public function testCalculateDistanceTravelOld()
    {
        $scenario = ['primaryForce' => 50, 'mass' => 3, 'delay' => 0.6, 'secondaryForce' => 60];
        $oldClass = new DistanceTravelOld();
        $result = $oldClass->distanceTravelled($scenario, 6);
        $this->assertEquals(156.0, $result);
    }
    public function testCalculateDistanceTravelRefactored()
    {
        $scenario = ['primary_force' => 50, 'mass' => 3, 'delay' => 0.6, 'secondary_force' => 60];
        $refactoredClass = new DistanceTravelRefactored();
        $result = $refactoredClass->distanceTravelled($scenario, 6);
        $this->assertEquals(156.0, $result);
    }
    public function testDiscountOld()
    {
        $discountClass = new DiscountOld();
        $result = $discountClass->discount(input_value: 80, quantity: 180);
        $this->assertEquals(77, $result);
    }
    public function testDiscountRefactored()
    {
        $discountClass = new DiscountRefactored();
        $result = $discountClass->discount(input_value: 80, quantity: 180);
        $this->assertEquals(77, $result);
    }
}
