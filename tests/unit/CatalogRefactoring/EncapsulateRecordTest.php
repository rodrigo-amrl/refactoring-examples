<?php

declare(strict_types=1);

use App\CatalogRefactoring\EncapsulateRecord\CustomerUsageOld;
use App\CatalogRefactoring\EncapsulateRecord\CustomerUsageRefactored;
use App\CatalogRefactoring\EncapsulateRecord\Factories\CustomerFactory;
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
    public function testCompareUsageCustomer()
    {
        $customer =  array_pop(CustomerFactory::make());

        $customerUsage = new CustomerUsageRefactored();
        $data = $customerUsage->compareUsage($customer['id'], key($customer['usages']), key(reset($customer['usages'])));


        $this->assertEquals($data['later_amount'], 40);
        $this->assertEquals($data['change'], 10);
    }
}
