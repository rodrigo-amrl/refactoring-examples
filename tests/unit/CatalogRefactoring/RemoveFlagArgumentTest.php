<?php

use App\CatalogRefactoring\RemoveFlagArgument\DeliveryOld;
use App\CatalogRefactoring\RemoveFlagArgument\DeliveryRefactored;
use PHPUnit\Framework\TestCase;

final class RemoveFlagArgumentTest extends TestCase
{

    public function testGetDeliveryDateOld()
    {
        $delivery = new DeliveryOld();
        $result = $delivery->deliveryDate(order: ['placed_on' => '2024-06-20', 'delivery_state' => "NH"], is_rush: false);

        $this->assertEquals('2024-06-25', $result);
    }
    public function testGetDeliveryDateRefactored()
    {
        $delivery = new DeliveryRefactored();
        $result = $delivery->regularDeliveryDate(order: ['placed_on' => '2024-06-20', 'delivery_state' => "NH"]);

        $this->assertEquals('2024-06-25', $result);
    }
}
