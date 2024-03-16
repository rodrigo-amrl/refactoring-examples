<?php

declare(strict_types=1);

use App\CatalogRefactoring\ReplaceInlineCodeWithFunctionCall\Old;
use App\CatalogRefactoring\ReplaceInlineCodeWithFunctionCall\Refactored;
use PHPUnit\Framework\TestCase;

final class ReplaceInlineCodeWithFunctionCallTest extends TestCase
{
    public function testCheckToMass()
    {
        $states = ['SC', "MA", "PA"];
        $function = new Old();
        $this->assertTrue($function->checkAppliesToMas($states));
    }
    public function testCheckToMassRefactored()
    {
        $states = ['SC', "MA", "PA"];
        $function = new Refactored();
        $this->assertTrue($function->checkAppliesToMas($states));
    }
    
}
