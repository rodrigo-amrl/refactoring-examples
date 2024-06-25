<?php

use App\CatalogRefactoring\ReplaceQueryWithParameter\ThermostatOld;
use App\CatalogRefactoring\ReplaceQueryWithParameter\ThermostatRefactored;
use PHPUnit\Framework\TestCase;

final class ReplaceQueryWithParameterTest extends TestCase
{


    public function testGetTargetTemperatureOld()
    {
        $thermosthat = new ThermostatOld(22);

        $result = $thermosthat->getTargetTemperature();

        $this->assertEquals("Thermostat turned off", $result);
    }
    public function testGetTargetTemperatureRefactored()
    {
        $thermosthat = new ThermostatRefactored(22);

        $result = $thermosthat->getTargetTemperature();

        $this->assertEquals("Thermostat turned off", $result);
    }
}
