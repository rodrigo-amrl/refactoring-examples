<?php

use App\CatalogRefactoring\MoveStatementsIntoFunction\PersonRefactored;
use PHPUnit\Framework\TestCase;

final class MoveStatementsIntoFunctionTest extends TestCase
{

    public function testRenderPerson()
    {
        $photo = ['title' => "Vacation", "location" => "Las Vegas", "2025-05-10"];
        $person_data = ['name' => "Rodrigo", 'photo' => $photo];
        $person = new PersonRefactored();
        $html_data = $person->renderPerson($person_data);

        $this->assertStringContainsString($photo['title'], $html_data);
        $this->assertStringContainsString($photo['location'], $html_data);
        $this->assertStringContainsString($person_data['name'], $html_data);
    }
}
