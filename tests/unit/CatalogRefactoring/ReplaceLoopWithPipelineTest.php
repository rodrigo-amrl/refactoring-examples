<?php

use App\CatalogRefactoring\ReplaceLoopWithPipeline\Old;
use App\CatalogRefactoring\ReplaceLoopWithPipeline\Refactored;
use PHPUnit\Framework\TestCase;

final class ReplaceLoopWithPipelineTest extends TestCase
{


    public function testOldAcquireData()
    {

        $input = "office, country, telephone\\n
        Chicago, USA, +1 312 373 1000\\n
        Beijing, China, +86 4008 900 505\\n
        Bangalore, India, +91 80 4064 9570\\n
        Porto Alegre, Brazil, +55 51 3079 3550\\n
        Chennai, India, +91 44 660 44766";
        $oldReplaceLoop = new Old();
        $return = $oldReplaceLoop->acquireData($input);


        $this->assertEquals($return[0]['city'], "Bangalore");
        $this->assertEquals($return[0]['phone'], "+91 80 4064 9570");
    }

    public function testRefactoredAcquireData()
    {

        $input = "office, country, telephone\\n
        Chicago, USA, +1 312 373 1000\\n
        Beijing, China, +86 4008 900 505\\n
        Bangalore, India, +91 80 4064 9570\\n
        Porto Alegre, Brazil, +55 51 3079 3550\\n
        Chennai, India, +91 44 660 44766";
        $oldReplaceLoop = new Refactored();
        $return = $oldReplaceLoop->acquireData($input);


        $this->assertEquals($return[0]['city'], "Bangalore");
        $this->assertEquals($return[0]['phone'], "+91 80 4064 9570");
    }
}
