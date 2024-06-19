<?php

use App\CatalogRefactoring\SeparateQueryFromModifier\FirewallOld;
use App\CatalogRefactoring\SeparateQueryFromModifier\FirewallRefactored;
use PHPUnit\Framework\TestCase;

final class SeparateQueryFromModifierTest extends TestCase
{


    public function testAlertForMiscreantOld()
    {

        $firewall = new FirewallOld();
        $response = $firewall->alertForMiscreant(['Cris', 'Anderson', 'John']);

        $this->assertEquals("John", $response);
    }
    public function testAlertForMiscreantRefactored()
    {
        $firewall = new FirewallRefactored();
        $response = $firewall->alertForMiscreant(['Cris', 'Anderson', 'John']);

        $this->assertEquals("John", $response);
    }
}
