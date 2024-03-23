<?php

use App\CatalogRefactoring\SplitLoop\Old;
use App\CatalogRefactoring\SplitLoop\Refactored;
use PHPUnit\Framework\TestCase;

final class SplitLoopTest extends TestCase
{



    public function testOldGetSalaryAndYoungest()
    {
        $peaple = [['age' => 55, 'salary' => 2000], ['age' => 22, 'salary' => 3000]];
        $splitLoopOld = new Old();
        $return = $splitLoopOld->getSalaryAndYoungest($peaple);


        $this->assertEquals($return, 'yougestAge: 22, totalSalary: 5000');
    }

    public function testRefactoredGetSalaryAndYoungest()
    {
        $peaple = [['age' => 55, 'salary' => 2000], ['age' => 22, 'salary' => 3000]];
        $splitLoopRefactored = new Refactored();
        $return = $splitLoopRefactored->getSalaryAndYoungest($peaple);

        $this->assertEquals($return, 'yougestAge: 22, totalSalary: 5000');
    }
}
