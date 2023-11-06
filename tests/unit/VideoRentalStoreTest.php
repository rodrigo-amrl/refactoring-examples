<?php

declare(strict_types=1);

use App\VideoRentalStore\Factories\InvoiceFactory;
use App\VideoRentalStore\Factories\PlayFactory;
use App\VideoRentalStore\PrintBillOld;
use PHPUnit\Framework\TestCase;

final class VideoRentalStoreTest extends TestCase
{

    public function testPrintBillOld(): void
    {
        $printBillOld = new PrintBillOld();
        $return = $printBillOld->statement(InvoiceFactory::make(), PlayFactory::make());

        $this->assertStringContainsString($return, 'Amount owed is $0.00');
        print_r($return);
        die('asdfasdf');
    }
}
