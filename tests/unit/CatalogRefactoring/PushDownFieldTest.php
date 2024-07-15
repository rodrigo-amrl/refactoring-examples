<?php

use App\CatalogRefactoring\PushDownField\EnginnerOld;
use App\CatalogRefactoring\PushDownField\EnginnerRefactored;
use PHPUnit\Framework\TestCase;

final class PushDownFieldTest extends TestCase
{

    public function testGetQuotaOld()
    {
        $enginer = new EnginnerOld('Fred', 2500);
        $this->assertEquals(500.0, $enginer->getQuota());
    }
    public function testGetQuotaRefactored()
    {
        $enginer = new EnginnerRefactored('Fred', 2500);
        $this->assertEquals(500.0, $enginer->getQuota());
    }
}
