<?php

use App\CatalogRefactoring\DecomposeConditional\RentalOld;
use App\CatalogRefactoring\DecomposeConditional\RentalRefactored;
use PHPUnit\Framework\TestCase;

final class DecomposeConditionalTest extends TestCase
{


    public function testCalculateChargeOld()
    {
        $rental = new RentalOld();
        $result = $rental->charge(['quantity' => 3]);

        $this->assertEquals(360, $result);
    }
    public function testCalculateChargeRefactored()
    {
        $rental = new RentalRefactored();
        $result = $rental->charge(['quantity' => 3]);

        $this->assertEquals(360, $result);
    }
}
