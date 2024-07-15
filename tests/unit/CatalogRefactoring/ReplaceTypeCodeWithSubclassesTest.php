<?php

use App\CatalogRefactoring\ReplaceTypeCodeWithSubclasses\Example1\EmployeeOld;
use App\CatalogRefactoring\ReplaceTypeCodeWithSubclasses\Example1\EmployeeRefactored;
use App\CatalogRefactoring\ReplaceTypeCodeWithSubclasses\Example2\EmployeeOld as EmployeeOldExample2;
use App\CatalogRefactoring\ReplaceTypeCodeWithSubclasses\Example2\EmployeeRefactored as EmployeeRefactoredExample2;

use PHPUnit\Framework\TestCase;

final class ReplaceTypeCodeWithSubclassesTest extends TestCase
{

    public function testGetEmployeeFullNameOld()
    {
        $employee = new EmployeeOld('Rick', 'engineer');
        $this->assertEquals('Rick (engineer)', $employee->toString());
    }
    public function testGetEmployeeFullNameRefactored()
    {
        $employee = EmployeeRefactored::createEmployee('Rick', 'engineer');
        $this->assertEquals('Rick (engineer)', $employee->toString());
    }
    public function testGetEmployeeFullNameExample2Old()
    {
        $employee = new EmployeeOldExample2('Rick', 'engineer');
        $this->assertEquals('Rick (Engineer)', $employee->toString());
    }
    public function testGetEmployeeFullNameExample2Refactored()
    {
        $employee = new EmployeeRefactoredExample2('Rick', 'engineer');
        $this->assertEquals('Rick (Engineer)', $employee->toString());
    }
}
