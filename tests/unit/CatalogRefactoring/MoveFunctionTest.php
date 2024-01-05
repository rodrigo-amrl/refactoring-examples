<?php

use App\CatalogRefactoring\MoveFunction\AccountRefactored;
use App\CatalogRefactoring\MoveFunction\AccountType;
use PHPUnit\Framework\TestCase;

final class MoveFunctionTest extends TestCase
{

    public function testgetBankCharge()
    {

        $account = new AccountRefactored(5, new AccountType(true));
        $charge = $account->getBankCharge();

        $this->assertEquals($charge, 14.5);
    }
}
