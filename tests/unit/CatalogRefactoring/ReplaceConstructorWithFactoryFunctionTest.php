<?php

use App\CatalogRefactoring\ReplaceConstructorWithFactoryFunction\CanditateOld;
use App\CatalogRefactoring\ReplaceConstructorWithFactoryFunction\CanditateRefactored;
use PHPUnit\Framework\TestCase;

final class ReplaceConstructorWithFactoryFunctionTest extends TestCase
{

    public function testGetCandidateOld()
    {

        $candidateClass = new CanditateOld('Juan', 'M');
        $candidate = $candidateClass->getCanditate();

        $this->assertEquals($candidate->getType(), "Manager");
    }
    public function testGetCandidateRefactored()
    {

        $candidateClass = new CanditateRefactored();
        $candidateClass->createCandidate('Juan', 'M');
        $candidate = $candidateClass->getCanditate();

        $this->assertEquals($candidate->getType(), "Manager");
    }
}
