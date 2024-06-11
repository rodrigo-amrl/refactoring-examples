<?php

namespace App\CatalogRefactoring\ReplaceConditionalWithPolymorphism\Example2;

class RatingRefactored
{
    public function rating($voyage, $history)
    {
        $experienceChinaRating = new ExperiencedChinaRating($voyage, $history);
        return $experienceChinaRating->value();
    }
}
