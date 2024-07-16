<?php

use App\CatalogRefactoring\ReplaceSubclassWithDelegate\Example1\BookingRefactored;
use App\CatalogRefactoring\ReplaceSubclassWithDelegate\Example1\PremiumBookingOld;
use App\CatalogRefactoring\ReplaceSubclassWithDelegate\Example2\BirdOld;
use App\CatalogRefactoring\ReplaceSubclassWithDelegate\Example2\BirdRefactored;
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

        $this->assertEquals(70, $book->getBasePrice());
    }
    public function testGetBirdSpeedOld()
    {
        $bird = BirdOld::createBird((object)['type' => "EuropeanSwallow", 'name' => 'Bird Spanish']);

        $this->assertEquals(35, $bird->airSpeedVelocity());
    }
    public function testGetBirdSpeedRefactored()
    {
        $bird = new BirdRefactored((object)['type' => "EuropeanSwallow", 'name' => 'Bird Spanish']);

        $this->assertEquals(35, $bird->airSpeedVelocity());
    }
}
