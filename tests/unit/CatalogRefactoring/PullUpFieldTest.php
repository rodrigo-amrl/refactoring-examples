<?php

use App\CatalogRefactoring\PullUpField\EngineerOld;
use App\CatalogRefactoring\PullUpField\EngineerRefactored;
use App\CatalogRefactoring\PullUpField\SalesmanOld;
use App\CatalogRefactoring\PullUpField\SalesmanRefactored;
use PHPUnit\Framework\TestCase;

class PullUpFieldTest extends TestCase
{

    public function testGetNameEmployeeOld()
    {

        $enginner = new EngineerOld('Harry', '33F');
        $salesman = new SalesmanOld('Frank', "34F");

        $this->assertEquals('Harry', $enginner->getName());
        $this->assertEquals('Frank', $salesman->getName());
    }
    public function testGetNameEmployeeRefactored()
    {

        $enginner = new EngineerRefactored('Harry', '33F');
        $salesman = new SalesmanRefactored('Frank', "34F");

        $this->assertEquals('Harry', $enginner->getName());
        $this->assertEquals('Frank', $salesman->getName());
    }
}
