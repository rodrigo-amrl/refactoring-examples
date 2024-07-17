<?php

use App\CatalogRefactoring\ReplaceSuperclassWithDelegate\ScrollOld;
use App\CatalogRefactoring\ReplaceSuperclassWithDelegate\ScrollRefactored;
use PHPUnit\Framework\TestCase;

final class ReplaceSuperclassWithDelegateTest extends TestCase
{

    public function testCheckNeedsCleaningOld()
    {
        $scroll = new ScrollOld(22, "The book", ['war', 'action'], date('Y-m-d', strtotime("-2 days")));
        $this->assertFalse($scroll->needCleaning(date('Y-m-d')));
    }
    public function testCheckNeedsCleaningRefactored()
    {
        $scroll = new ScrollRefactored(22, "The book", ['war', 'action'], date('Y-m-d', strtotime("-2 days")));
        $this->assertFalse($scroll->needCleaning(date('Y-m-d')));
    }
}
