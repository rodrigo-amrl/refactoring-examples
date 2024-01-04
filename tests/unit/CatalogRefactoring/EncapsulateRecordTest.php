<?php

declare(strict_types=1);

use App\CatalogRefactoring\EncapsulateRecord\PrintOrganizationRefatored;
use PHPUnit\Framework\TestCase;

final class EncapsulateRecordTest extends TestCase
{

    public function testPrintOrganization()
    {
        $printOrganization = new PrintOrganizationRefatored();
        $organization_print =  $printOrganization->printHtml();

        $this->assertStringContainsString("Acme Gooseberries", $organization_print);
    }
}
