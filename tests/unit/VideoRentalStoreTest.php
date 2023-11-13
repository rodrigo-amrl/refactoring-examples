<?php

declare(strict_types=1);

use App\VideoRentalStore\Factories\InvoiceFactory;
use App\VideoRentalStore\Factories\PlayFactory;
use App\VideoRentalStore\Refactored\PrintBill;
use PHPUnit\Framework\TestCase;

final class VideoRentalStoreTest extends TestCase
{

    public function testPrintBill(): void
    {
        $printBillOld = new PrintBill();
        $return = $printBillOld->statement(InvoiceFactory::make(), PlayFactory::make());

        $this->assertStringContainsString('Hamlet: $650.00', $return);
    }
}
