<?php

use App\CatalogRefactoring\MoveField\CustomerRefactored;
use PHPUnit\Framework\TestCase;

final class MoveFieldTest extends TestCase
{
    public function testGetDiscountRate()
    {
        $customer = new CustomerRefactored('Rodrigo', 0.5);
        $customer->setDiscountRate(10);

        $this->assertEquals(10, $customer->getDiscountRate());
    }
}
