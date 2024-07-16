<?php

use App\CatalogRefactoring\ReplaceSubclassWithDelegate\BookingRefactored;
use App\CatalogRefactoring\ReplaceSubclassWithDelegate\PremiumBookingOld;
use PHPUnit\Framework\TestCase;

final class ReplaceSubclassWithDelegateTest extends TestCase
{

    public function testGetBasePricePremiumBookOld()
    {

        $book = new PremiumBookingOld(show: (object)['price' => 52], date: date("Y-m-d"), extras: (object)['premium_fee' => 10]);

        $this->assertEquals(70.0, $book->getBasePrice());
    }
    public function testGetBasePricePremiumBookRefactored()
    {

        $book = BookingRefactored::createPremiumBook(show: (object)['price' => 52], date: date("Y-m-d"), extras: (object)['premium_fee' => 10]);

        $this->assertEquals(60, $book->getBasePrice());
    }
}
