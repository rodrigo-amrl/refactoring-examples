<?php

use App\CatalogRefactoring\InlineClass\Factories\TrackingInfoFactory;
use App\CatalogRefactoring\InlineClass\ShipmentRefactored;
use PHPUnit\Framework\TestCase;

final class InlineClassTest extends TestCase
{

    public function testGetTrackingInfo()
    {
        $tracking_data = TrackingInfoFactory::make();
        $shipment = new ShipmentRefactored(...$tracking_data);

        $this->assertStringContainsString($tracking_data['shipping_company'], $shipment->getTrackingInfo());
        $this->assertStringContainsString($tracking_data['tracking_number'], $shipment->getTrackingInfo());
    }
}
