<?php

use App\CatalogRefactoring\ReplaceFunctionWithCommand\CandidateOld;
use App\CatalogRefactoring\ReplaceFunctionWithCommand\CandidateRefactored;
use PHPUnit\Framework\TestCase;

final class ReplaceFunctionWithCommandTest extends TestCase
{

    public function testGetScoreCandidateOld()
    {
        $score = new CandidateOld();
        $result = $score->score(
            candidate: (object)['origin_state' => "SC"],
            medical_exam: (object) ['is_smoker' => false]
        );

        $this->assertEquals(5, $result);
    }
    public function testGetScoreCandidateRefactored()
    {
        $score = new CandidateRefactored();
        $result = $score->score(
            candidate: (object)['origin_state' => "SC"],
            medical_exam: (object) ['is_smoker' => false]
        );

        $this->assertEquals(5, $result);
    }
}
