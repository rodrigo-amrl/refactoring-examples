<?php

use App\CatalogRefactoring\ReplaceDerivedVariableWithQuery\ProductionPlanOld;
use App\CatalogRefactoring\ReplaceDerivedVariableWithQuery\ProductionPlanRefactored;
use PHPUnit\Framework\TestCase;

final class ReplaceDerivedVariableWithQueryTest extends TestCase
{

    public function testApplyAdjustmentOld()
    {

        $prodution_total = 30.4;
        $production = new ProductionPlanOld(production: $prodution_total);

        $adjustment = ['amount' => 10];
        $production->ApplyAdjustment($adjustment);

        $this->assertEquals($adjustment['amount'] + $prodution_total, $production->getProduction());
    }
    public function testApplyAdjustmentRefactored()
    {

        $production = new ProductionPlanRefactored();

        $adjustment = ['amount' => 30];
        $production->ApplyAdjustment($adjustment);

        $this->assertEquals($adjustment['amount'], $production->getProduction());
    }
}
