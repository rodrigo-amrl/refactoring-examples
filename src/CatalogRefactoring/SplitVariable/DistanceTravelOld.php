<?php

namespace App\CatalogRefactoring\SplitVariable;




/**
 * Split Variable
 * Passos:
 * 1- Altere o nome da variável na sua declaração e primeira atribuição
 * 2- Se possível, declare a nova variável como imutável
 * 3 - Altere todas as referências da variável até a segunda atribuição
 * 4- Test
 */
class DistanceTravelOld
{

    public function distanceTravelled($scenario, $time)
    {

        $result = 0;
        $acc = $scenario['primaryForce'] / $scenario['mass'];
        $primaryTime = min($time, $scenario['delay']);
        $result = 0.5 * $acc * $primaryTime * $primaryTime;
        $secondaryTime = $time - $scenario['delay'];
        if ($secondaryTime > 0) {
            $primaryVelocity = $acc * $scenario['delay'];
            $acc = ($scenario['primaryForce'] + $scenario['secondaryForce']) / $scenario['mass'];
            $result += $primaryVelocity * $secondaryTime + 0.5 * $acc * $secondaryTime;
        }
        return $result;
    }
}
