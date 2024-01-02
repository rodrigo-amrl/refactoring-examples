<?php

declare(strict_types=1);

use App\CatalogRefactoring\ExtractVariable\Factories\OrderFactory;
use App\CatalogRefactoring\ExtractVariable\OrderRefactored;
use PHPUnit\Framework\TestCase;

final class ExtractVariableTest extends TestCase
{

    public function testGetPrice()
    {

        $order = new OrderRefactored(OrderFactory::make());
        $price =  $order->getPrice();

        $this->assertEquals($price, 184.25);
    }
}
