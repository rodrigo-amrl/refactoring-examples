<?php

use App\CatalogRefactoring\ExtractSuperclass\DepartmentOld;
use App\CatalogRefactoring\ExtractSuperclass\DepartmentRefactored;
use App\CatalogRefactoring\ExtractSuperclass\EmployeeOld;
use App\CatalogRefactoring\ExtractSuperclass\EmployeeRefactored;
use PHPUnit\Framework\TestCase;

final class ExtractSuperclassTest extends TestCase
{

    public function testGetNameOld()
    {

        $employee_data = ['name' => 'Eric', ['monthly_cost']];
        $department = new DepartmentOld('RH', [$employee_data]);
        $employee = new EmployeeOld($employee_data['name'], 33, 33.20);
        $this->assertEquals("RH", $department->getName());
        $this->assertEquals("Eric", $employee->getName());
    }
    public function testGetNameRefactored()
    {

        $employee_data = ['name' => 'Eric', ['monthly_cost']];
        $department = new DepartmentRefactored('RH', [$employee_data]);
        $employee = new EmployeeRefactored($employee_data['name'], 33, 33.20);
        $this->assertEquals("RH", $department->getName());
        $this->assertEquals("Eric", $employee->getName());
    }
}
