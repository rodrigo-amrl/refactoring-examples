<?php

use App\CatalogRefactoring\CollapseHierarchy\EmployeeRefactored;
use App\CatalogRefactoring\CollapseHierarchy\SalesmanOld;
use PHPUnit\Framework\TestCase;

final class CollapseHierarchyTest extends TestCase
{


    public function testGetAnnualSalaryOld()
    {
        $employee = new SalesmanOld('Cris', 3000);
        $this->assertEquals(36000, $employee->getAnnualSalary());
    }
    public function testGetAnnualSalaryRefactored()
    {
        $employee = new EmployeeRefactored('Cris', 3000);
        $this->assertEquals(36000, $employee->getAnnualSalary());
    }
}
