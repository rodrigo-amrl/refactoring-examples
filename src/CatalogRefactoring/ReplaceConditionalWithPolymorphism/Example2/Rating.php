<?php

namespace App\CatalogRefactoring\ReplaceConditionalWithPolymorphism\Example2;

class Rating
{
    public function __construct(
        protected array $voyage,
        protected array $history
    ) {
    }

    public function value()
    {
        $vpf = $this->voyageProfitFactor();
        $vr = $this->voyageRisk();
        $chr = $this->captainHistoryRisk();
        if ($vpf * 3 > ($vr + $chr * 2)) return "A";
        else return "B";
    }

    public function voyageRisk()
    {
        $result = 1;
        if ($this->voyage['length'] > 4) $result += 2;
        if ($this->voyage['length'] > 8) $result += $this->voyage['length'] - 8;
        if (in_array($this->voyage['zone'], array("china", "east-indies"))) $result += 4;
        return max($result, 0);
    }

    public function captainHistoryRisk()
    {
        $result = 1;
        if (count($this->history) < 5) $result += 4;
        $result += count(array_filter($this->history, function ($v) {
            return $v['profit'] < 0;
        }));
        return max($result, 0);
    }

    public function voyageProfitFactor()
    {
        $result = 2;
        if ($this->voyage['zone'] === "china") $result += 1;
        if ($this->voyage['zone'] === "east-indies") $result += 1;
        $result += $this->historyLengthFactor();
        $result += $this->voyageLengthFactor();
        return $result;
    }

    public function voyageLengthFactor()
    {
        return ($this->voyage['length'] > 14) ? -1 : 0;
    }

    public function historyLengthFactor()
    {
        return (count($this->history) > 8) ? 1 : 0;
    }
}
