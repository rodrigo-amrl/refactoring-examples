<?php

use App\CatalogRefactoring\ReplaceParameterWithQuery\OrderOld;
use App\CatalogRefactoring\ReplaceParameterWithQuery\OrderRefactored;
use PHPUnit\Framework\TestCase;

final class ReplaceParameterWithQueryTest extends TestCase
{


    public function testGetPriceOrderOld()
    {
        $order = new OrderOld(
            quantity: 3,
            item_price: 20.10
        );
        $final_price = $order->finalPrice();

        $this->assertEquals(57.29, $final_price);
    }
    public function testGetPriceOrderRefactored()
    {
        $order = new OrderRefactored(
            quantity: 3,
            item_price: 20.10
        );
        $final_price = $order->finalPrice();

        $this->assertEquals(57.29, $final_price);
    }
}
