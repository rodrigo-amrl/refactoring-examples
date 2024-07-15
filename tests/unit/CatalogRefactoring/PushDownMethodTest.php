<?php

use App\CatalogRefactoring\PushDownMethod\EnginnerOld;
use App\CatalogRefactoring\PushDownMethod\EnginnerRefactored;
use PHPUnit\Framework\TestCase;

final class PushDownMethodTest extends TestCase
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
