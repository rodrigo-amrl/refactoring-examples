<?php

use App\CatalogRefactoring\MoveField\Account\AccountRefactored;
use App\CatalogRefactoring\MoveField\Account\AccountTypeRefactored;
use App\CatalogRefactoring\MoveField\Customer\CustomerRefactored;
use PHPUnit\Framework\TestCase;

final class MoveFieldTest extends TestCase
{
    public function testGetDiscountRate()
    {
        $customer = new CustomerRefactored('Rodrigo', 0.5);
        $customer->setDiscountRate(10);

        $this->assertEquals(10, $customer->getDiscountRate());
    }
    public function testGetInterestRate()
    {
        $account = new AccountRefactored(57778.00, new AccountTypeRefactored('premium', 6));
        $this->assertEquals($account->getInterestRate(), 6);
    }
}
