<?php

use App\CatalogRefactoring\ConsolidateConditionalExpression\EmployeeOld;
use App\CatalogRefactoring\ConsolidateConditionalExpression\EmployeeRefactored;
use PHPUnit\Framework\TestCase;

final class ConsolidateConditionalExpressionTest extends TestCase
{

    public function testCalculateDisabilityAmountOld()
    {

        $employee = ['seniority' => 1, 'months_disabled' => 0, 'is_part_time' => false];

        $old = new EmployeeOld();
        $result  = $old->disabilityAmount($employee);

        $this->assertEquals(0, $result);
    }
    public function testCalculateDisabilityAmountRefactored()
    {

        $employee = ['seniority' => 1, 'months_disabled' => 0, 'is_part_time' => false];

        $old = new EmployeeRefactored();
        $result  = $old->disabilityAmount($employee);

        $this->assertEquals(0, $result);
    }
}
