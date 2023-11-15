<?php

declare(strict_types=1);

use App\VideoRentalStore\Refactored\Factories\InvoiceFactory;
use App\VideoRentalStore\Refactored\Factories\PlayFactory;
use App\VideoRentalStore\Refactored\PrintBill;
use PHPUnit\Framework\TestCase;

final class VideoRentalStoreTest extends TestCase
{

    public function testPrintBill(): void
    {
        $printBillOld = new PrintBill(PlayFactory::make());
        $return = $printBillOld->statement(InvoiceFactory::make());

        $this->assertStringContainsString('Hamlet: $650.00', $return);
    }
}
