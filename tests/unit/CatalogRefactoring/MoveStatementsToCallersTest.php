<?php

use App\CatalogRefactoring\MoveStatementsToCallers\PersonRefactored;
use PHPUnit\Framework\TestCase;

final class MoveStatementsToCallersTest extends TestCase
{

    public function testRenderPerson()
    {
        $photo = ['title' => "Vacation", "location" => "Las Vegas", "2025-05-10"];
        $person_data = ['name' => "Rodrigo", 'photo' => $photo];
        $person = new PersonRefactored();

        $this->expectOutputRegex("/{$photo['title']}/");
        $person->renderPerson($person_data);

    }
}
