<?php

declare(strict_types=1);

use App\CatalogRefactoring\ChangeFunctionDeclaration\CustomerOld;
use App\CatalogRefactoring\ChangeFunctionDeclaration\CustomerRefactored;
use App\CatalogRefactoring\ChangeFunctionDeclaration\Factories\AddressFactory;
use App\CatalogRefactoring\ChangeFunctionDeclaration\Factories\CustomerFactory;
use PHPUnit\Framework\TestCase;

final class ChangeFunctionDeclarationTest extends TestCase
{

    public function testGetCustomersEnglanders()
    {

        $customers = new CustomerRefactored(CustomerFactory::make());
        $englanders = $customers->getNewEnglanders();

        $this->assertCount(3, $englanders);
    }
}
