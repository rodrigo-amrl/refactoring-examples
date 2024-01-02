<?php

declare(strict_types=1);

use App\CatalogRefactoring\InlineVariable\Factories\OrderFactory;
use App\CatalogRefactoring\InlineVariable\OrderRefactored;
use PHPUnit\Framework\TestCase;

final class InlineVariableTest extends TestCase
{

    public function testPriceOrder()
    {
        $order = new OrderRefactored(OrderFactory::make());
        $price =  $order->getPrice();

        $this->assertEquals($price, 167.5);
    }
}
