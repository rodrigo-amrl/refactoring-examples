<?php

declare(strict_types=1);

use App\CatalogRefactoring\CombineFunctionIntoClass\CalculatorReadingRefatored;
use PHPUnit\Framework\TestCase;

final class CombineFunctionIntoTransformTest extends TestCase
{

    public function testCalculatorBaseCharge()
    {
        $calculator = new CalculatorReadingRefatored();
        $result = $calculator->getBaseCharge();
        $this->assertEquals($result, 0.005);
    }
    public function testCalculatorTaxableCharge()
    {
        $calculator = new CalculatorReadingRefatored();
        $result = $calculator->getTaxableCharge();
        $this->assertEquals($result, 0);
    }
}
