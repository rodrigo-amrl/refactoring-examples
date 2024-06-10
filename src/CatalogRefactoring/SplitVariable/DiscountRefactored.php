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
class DiscountRefactored
{
    function discount($input_value, $quantity)
    {
        $result = $input_value;
        if ($input_value > 50) $result = $input_value - 2;
        if ($quantity > 100) $result = $input_value - 1;
        return $result;
    }
}
