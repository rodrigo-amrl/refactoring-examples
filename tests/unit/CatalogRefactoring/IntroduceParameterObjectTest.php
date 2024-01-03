<?php

declare(strict_types=1);

use App\CatalogRefactoring\IntroduceParameterObject\Factories\StationFactory;
use App\CatalogRefactoring\IntroduceParameterObject\OperatingPlanRefactored;
use PHPUnit\Framework\TestCase;

final class IntroduceParameterObjectTest extends TestCase
{

    public function testCheckAlertTemperature()
    {

        $operatatinPlan = new OperatingPlanRefactored(StationFactory::make());
        $alerts = $operatatinPlan->checkAlerts();
        $this->assertCount(3, $alerts);
    }
}
