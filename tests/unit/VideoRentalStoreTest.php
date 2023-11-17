<?php

declare(strict_types=1);

use App\VideoRentalStore\Refactored\Factories\InvoiceFactory;
use App\VideoRentalStore\Refactored\Factories\PlayFactory;
use App\VideoRentalStore\Refactored\Statement;
use PHPUnit\Framework\TestCase;

final class VideoRentalStoreTest extends TestCase
{

    public function testStatementPrintText(): void
    {
        $printBillOld = new Statement();
        $return = $printBillOld->statement(InvoiceFactory::make(), PlayFactory::make());

        $this->assertStringContainsString('Hamlet: $650.00', $return);
    }
    public function testStatementRenderHtml(): void
    {
        $printBillOld = new Statement();
        $return = $printBillOld->htmlStatement(InvoiceFactory::make(), PlayFactory::make());

        $this->assertStringContainsString('<tr><td>Othello</td><td>40</td><td>$500.00</td></tr>', $return);
    }
}
