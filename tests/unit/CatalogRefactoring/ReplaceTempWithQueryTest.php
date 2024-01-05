<?php

declare(strict_types=1);

use App\CatalogRefactoring\ReplaceTempWithQuery\OrderRefactored;
use PHPUnit\Framework\TestCase;

final class ReplaceTempWithQueryTest extends TestCase
{
    public function testOrderPrice()
    {
        $order = new OrderRefactored(3, ['price' => 22.60]);
        $price =  $order->getPrice();
        $this->assertEquals($price, 64.41);
    }
}
