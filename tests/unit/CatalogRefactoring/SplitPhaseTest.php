<?php

declare(strict_types=1);

use App\CatalogRefactoring\SplitPhase\Factories\OrderFactory;
use App\CatalogRefactoring\SplitPhase\OrderRefactored as SplitPhaseOrderRefactored;
use PHPUnit\Framework\TestCase;

final class SplitPhaseTest extends TestCase
{

    public function testCalculatePriceOrder()
    {

        $order = new SplitPhaseOrderRefactored();
        $price = $order->priceOrder(...OrderFactory::make());
        $this->assertEquals($price, 58.08);
    }
}
