<?php

declare(strict_types=1);

use App\CatalogRefactoring\ExtractFunction\Factories\InvoiceFactory;
use App\CatalogRefactoring\ExtractFunction\Refactored;
use PHPUnit\Framework\TestCase;

final class ExtractFunctionTest extends TestCase
{

    public function testPrintOwing()
    {
        $refactored = new Refactored();
        $invoice =  $refactored->PrintOwing(InvoiceFactory::make());

        $this->assertStringContainsString("Amount: 59.36", $invoice);
    }
}
