<?php

use App\CatalogRefactoring\PreserveWholeObject\Old;
use App\CatalogRefactoring\PreserveWholeObject\Refactored;
use PHPUnit\Framework\TestCase;

final class PreserveWholeObjectTest extends TestCase
{
    public function testCheckRoomTempOld()
    {
        $old = new Old();
        $this->expectExceptionMessage('room temperatura went outside range');
        $old->checkRoomTemp((object)['days_temp_range' => (object)['low' => 10, 'high' => 120]]);
    }
    public function testCheckRoomTempRefactored()
    {
        $old = new Refactored();
        $this->expectExceptionMessage('room temperatura went outside range');
        $old->checkRoomTemp((object)['days_temp_range' => (object)['low' => 10, 'high' => 120]]);
    }
}
