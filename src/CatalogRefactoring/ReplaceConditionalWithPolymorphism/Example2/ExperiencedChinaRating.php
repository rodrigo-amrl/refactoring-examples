<?php

namespace App\CatalogRefactoring\ReplaceConditionalWithPolymorphism\Example2;

class ExperiencedChinaRating extends Rating
{

    public function captainHistoryRisk()
    {
        $result = parent::captainHistoryRisk() - 2;
        return max($result, 0);
    }

    public function voyageLengthFactor()
    {
        $result = 0;
        if ($this->voyage['length'] > 12) $result += 1;
        if ($this->voyage['length'] > 18) $result -= 1;
        return $result;
    }

    public function historyLengthFactor()
    {
        return (count($this->history) > 10) ? 1 : 0;
    }

    public function voyageProfitFactor()
    {
        return parent::voyageProfitFactor() + 3;
    }
}
