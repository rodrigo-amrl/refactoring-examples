<?php

use App\CatalogRefactoring\RenameField\Old;
use App\CatalogRefactoring\RenameField\Refactored;
use PHPUnit\Framework\TestCase;

final class RenameFieldTest extends TestCase
{


    public function testShowOrganizationOld()
    {
        $old = new Old();
        $result = $old->showOrganization();
        $this->assertStringContainsString('Starlink', $result);
    }
    public function testShowOrganizationRefactored()
    {
        $old = new Refactored();
        $result = $old->showOrganization();
        $this->assertStringContainsString('Starlink', $result);
    }
}
