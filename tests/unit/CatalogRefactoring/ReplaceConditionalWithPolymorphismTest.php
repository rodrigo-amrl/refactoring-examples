<?php

use App\CatalogRefactoring\ReplaceConditionalWithPolymorphism\Example1\BirdOld;
use App\CatalogRefactoring\ReplaceConditionalWithPolymorphism\Example1\BirdRefactored;
use App\CatalogRefactoring\ReplaceConditionalWithPolymorphism\Example2\RatingOld;
use App\CatalogRefactoring\ReplaceConditionalWithPolymorphism\Example2\RatingRefactored;
use PHPUnit\Framework\TestCase;

final class ReplaceConditionalWithPolymorphismTest extends TestCase
{

    public function testGetBirdDataOld()
    {
        $bird_data = ['type' => "Norwegian Blue Parrot", 'number_of_coconuts' => 3, 'voltage' => 120, 'is_nailed' => false];
        $bird = new BirdOld();
        $plumage = $bird->plumage($bird_data);
        $speed = $bird->airSpeedVelocity($bird_data);
        $this->assertEquals('scorched', $plumage);
        $this->assertEquals(22, $speed);
    }
    public function testGetBirdDataRefactored()
    {
        $bird_data = ['type' => "Norwegian Blue Parrot", 'number_of_coconuts' => 3, 'voltage' => 120, 'is_nailed' => false];
        $bird = new BirdRefactored();
        $result = $bird->createBird($bird_data);

        $this->assertEquals('scorched', $result->getPlumage());
        $this->assertEquals(22, $result->getAirSpeedVelocity());
    }

    public function testRatingOld()
    {
        $voyage = array("zone" => "west-indies", "length" => 10);

        $history = array(
            array("zone" => "east-indies", "profit" => 5),
            array("zone" => "west-indies", "profit" => 15),
            array("zone" => "china", "profit" => -2),
            array("zone" => "west-africa", "profit" => 7)
        );

        $rating = new RatingOld();
        $result = $rating->rating($voyage, $history);

        $this->assertEquals('B', $result);
    }
    public function testRatingRefactored()
    {
        $voyage = array("zone" => "west-indies", "length" => 10);

        $history = array(
            array("zone" => "east-indies", "profit" => 5),
            array("zone" => "west-indies", "profit" => 15),
            array("zone" => "china", "profit" => -2),
            array("zone" => "west-africa", "profit" => 7)
        );

        $rating = new RatingRefactored();
        $result = $rating->rating($voyage, $history);

        $this->assertEquals('A', $result);
    }
}
