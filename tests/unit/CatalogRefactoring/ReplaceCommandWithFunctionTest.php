<?php

use App\CatalogRefactoring\ReplaceCommandWithFunction\ClientOld;
use PHPUnit\Framework\TestCase;

class ReplaceCommandWithFunctionTest extends TestCase
{

    public function testGetChargeClientOld()
    {
        $client = new ClientOld();
        $result = $client->getChargeCliente(
            customer: (object)['base_rage' => 0.25],
            usage: 5.5,
            provider: (object) ['connection_charge' => 20.90]
        );

        $this->assertEquals(20.9, $result);
    }

    public function testGetChargeClientRefactored()
    {
        $client = new ClientOld();
        $result = $client->getChargeCliente(
            customer: (object)['base_rage' => 0.25],
            usage: 5.5,
            provider: (object) ['connection_charge' => 20.90]
        );

        $this->assertEquals(20.9, $result);
    }
}
