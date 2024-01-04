<?php

declare(strict_types=1);

use App\CatalogRefactoring\ReplacePrimitiveWithObject\Refactored\Order;
use App\CatalogRefactoring\ReplacePrimitiveWithObject\Refactored\OrderControl;
use App\CatalogRefactoring\ReplacePrimitiveWithObject\Refactored\Priority;
use PHPUnit\Framework\TestCase;

final class ReplacePrimitiveWithObjectTest extends TestCase
{

    public function testHighOrdersPriority()
    {
        $orderControl = new OrderControl([new Order(new Priority('low')), new Order(new Priority('high'))]);
        $order_high = $orderControl->higthPriorityCount();

        $this->assertCount(1, $order_high);
    }
}
