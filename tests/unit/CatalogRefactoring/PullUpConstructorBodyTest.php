<?php

use App\CatalogRefactoring\PullUpConstructorBody\Example1\DepartmentOld;
use App\CatalogRefactoring\PullUpConstructorBody\Example1\DepartmentRefactored;
use App\CatalogRefactoring\PullUpConstructorBody\Example1\EmployeeOld;
use App\CatalogRefactoring\PullUpConstructorBody\Example1\EmployeeRefactored;
use App\CatalogRefactoring\PullUpConstructorBody\Example2\ManagerOld;
use App\CatalogRefactoring\PullUpConstructorBody\Example2\ManagerRefactored;
use PHPUnit\Framework\TestCase;

final class PullUpConstructorBodyTest extends TestCase
{

    public function testGetNamePartyOld()
    {

        $employee = new EmployeeOld('Jack', 32, 200);
        $department = new DepartmentOld('Alex', 'John');

        $this->assertEquals('Jack', $employee->getName());
        $this->assertEquals('Alex', $department->getName());
    }
    public function testGetNamePartyRefactered()
    {

        $employee = new EmployeeRefactored('Jack', 32, 200);
        $department = new DepartmentRefactored('Alex', 'John');

        $this->assertEquals('Jack', $employee->getName());
        $this->assertEquals('Alex', $department->getName());
    }
    public function testCheckIsPriviledOld()
    {

        $manager = new ManagerOld('Anderson', 6);

        $this->assertTrue($manager->isPrivileged());
    }
    public function testCheckIsPriviledRefactored()
    {

        $manager = new ManagerRefactored('Anderson', 6);

        $this->assertTrue($manager->isPrivileged());
    }
}
