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
class DistanceTravelRefactored
{

    public function distanceTravelled(array $scenario, int $time)
    {
        $result = 0;
        $primary_acceleration = $scenario['primary_force'] / $scenario['mass'];
        $primary_time = min($time, $scenario['delay']);
        $result = 0.5 * $primary_acceleration * $primary_time * $primary_time;
        $secondary_time = $time - $scenario['delay'];
        if ($secondary_time > 0) {
            $primary_velocity = $primary_acceleration * $scenario['delay'];
            $secondary_acceleration = ($scenario['primary_force'] + $scenario['secondary_force']) / $scenario['mass'];
            $result += $primary_velocity * $secondary_time + 0.5 * $secondary_acceleration * $secondary_time;
        }
        return $result;
    }
}
