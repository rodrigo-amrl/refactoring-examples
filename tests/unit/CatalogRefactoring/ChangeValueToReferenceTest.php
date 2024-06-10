<?php

use App\CatalogRefactoring\ChangeValueToReference\OrderOld;
use App\CatalogRefactoring\ChangeValueToReference\OrderRefactored;
use PHPUnit\Framework\TestCase;

final class ChangeValueToReferenceTest extends TestCase
{


    public function testGetOrderCustomerOld()
    {

        $data = ['number' => 33, 'customer' => 9993];
        $order = new OrderOld($data);

        $this->assertEquals($data['customer'], $order->getCustomer()->getId());
    }
    public function testGetOrderCustomerRefactored()
    {

        $data = ['number' => 33, 'customer' => 9993];
        $order = new OrderRefactored($data);

        $this->assertEquals($data['customer'], $order->getCustomer()->getId());
    }
}
