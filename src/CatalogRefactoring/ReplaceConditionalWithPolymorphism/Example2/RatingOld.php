<?php

namespace App\CatalogRefactoring\ReplaceConditionalWithPolymorphism\Example2;

class RatingOld
{
    public function rating($voyage, $history)
    {
        $vpf = $this->voyageProfitFactor($voyage, $history);
        $vr = $this->voyageRisk($voyage);
        $chr = $this->captainHistoryRisk($voyage, $history);
        if ($vpf * 3 > ($vr + $chr * 2)) return "A";
        else return "B";
    }
    function voyageRisk($voyage)
    {
        $result = 1;
        if ($voyage['length'] > 4) $result += 2;
        if ($voyage['length'] > 8) $result += $voyage['length'] - 8;
        if (in_array($voyage['zone'], ["china", "east-indies"])) $result += 4;
        return max($result, 0);
    }
    function captainHistoryRisk($voyage, $history)
    {
        $result = 1;
        if (count($history) < 5) $result += 4;
        $result += count(array_filter($history, function ($v) {
            return $v['profit'] < 0;
        }));
        if ($voyage['zone'] === "china" &&  $this->hasChina($history)) $result -= 2;
        return max($result, 0);
    }
    function hasChina($history)
    {
        foreach ($history as $v) {
            if ($v['zone'] === "china") return true;
        }
        return false;
    }
    function voyageProfitFactor($voyage, $history)
    {
        $result = 2;
        if ($voyage['zone'] === "china") $result += 1;
        if ($voyage['zone'] === "east-indies") $result += 1;
        if ($voyage['zone'] === "china" && $this->hasChina($history)) {
            $result += 3;
            if (count($history) > 10) $result += 1;
            if ($voyage['length'] > 12) $result += 1;
            if ($voyage['length'] > 18) $result -= 1;
        } else {
            if (count($history) > 8) $result += 1;
            if ($voyage['length'] > 14) $result -= 1;
        }
        return $result;
    }
}
