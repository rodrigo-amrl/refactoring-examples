<?php

use App\CatalogRefactoring\IntroduceAssertion\CustomerOld;
use App\CatalogRefactoring\IntroduceAssertion\CustomerRefactored;
use PHPUnit\Framework\TestCase;

final class IntroduceAssertionTest extends TestCase
{


    public function testApplyDiscountOld()
    {
        $customer = new CustomerOld();
        $result = $customer->ApplyDiscount(33.90);
        $this->assertEquals(33.90, $result);
    }
    public function testApplyDiscountRefactored()
    {
        $customer = new CustomerRefactored();
        $result = $customer->ApplyDiscount(33.90);
        $this->assertEquals(33.90, $result);
    }
}
