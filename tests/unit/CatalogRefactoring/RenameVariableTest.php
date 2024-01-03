<?php

declare(strict_types=1);

use App\CatalogRefactoring\RenameVariable\HeadRefactored;
use PHPUnit\Framework\TestCase;

final class RenameVariableTest extends TestCase
{

    public function testMountHtmlHead()
    {

        $head = new HeadRefactored();
        $head->setTitle('Refatorando');
        $head->setSubTitle('Com PHP');

        $this->assertStringContainsString('Refatorando', $head->mountHtml());
        $this->assertStringContainsString('PHP', $head->mountHtml());
    }
}
