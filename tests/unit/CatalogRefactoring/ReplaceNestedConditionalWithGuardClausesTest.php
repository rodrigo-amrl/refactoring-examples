<?php

use App\CatalogRefactoring\ReplaceNestedConditionalWithGuardClauses\CapitalOld;
use App\CatalogRefactoring\ReplaceNestedConditionalWithGuardClauses\CapitalRefactored;
use App\CatalogRefactoring\ReplaceNestedConditionalWithGuardClauses\PaymentOld;
use App\CatalogRefactoring\ReplaceNestedConditionalWithGuardClauses\PaymentRefactored;
use PHPUnit\Framework\TestCase;

final class ReplaceNestedConditionalWithGuardClausesTest extends TestCase
{

    public function testCalculatePaymentOld()
    {

        $employee = ['is_separated' => false, 'is_retired' => true];

        $payment = new PaymentOld();
        $result = $payment->payAmount($employee);

        $this->assertEquals(0, $result['amount']);
    }
    public function testCalculatePaymentRefactored()
    {
        $employee = ['is_separated' => false, 'is_retired' => true];
        $payment = new PaymentRefactored();
        $result = $payment->payAmount($employee);

        $this->assertEquals(0, $result['amount']);
    }

    public function testCalculateCapitalOld()
    {
        $instrument = ['capital' => 3444, 'interest_rate' => 50, 'duration' => 3, 'income' => 100, 'adj' => 0.6];

        $capital = new CapitalOld();
        $result = $capital->adjustedCapital($instrument);

        $this->assertEquals(20, $result);
    }
    public function testCalculateCapitalRefactored()
    {
        $instrument = ['capital' => 3444, 'interest_rate' => 50, 'duration' => 3, 'income' => 100, 'adj' => 0.6];

        $capital = new CapitalRefactored();
        $result = $capital->adjustedCapital($instrument);

        $this->assertEquals(20, $result);
    }
}
