<?php

use App\CatalogRefactoring\SubstituteAlgorithm\PersonRefactored;
use PHPUnit\Framework\TestCase;

final class SubstituteAlgorithmTest extends TestCase
{

    public function testFoundPerson()
    {
        $person = new PersonRefactored();
        $return = $person->foundPerson(["Joe", "Alex", "John"]);

        $this->assertEquals("John", $return);
    }
}
