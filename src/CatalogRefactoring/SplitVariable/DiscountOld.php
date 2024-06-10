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
class DiscountOld
{
    function discount($input_value, $quantity)
    {
        if ($input_value > 50) $input_value = $input_value - 2;
        if ($quantity > 100) $input_value = $input_value - 1;
        return $input_value;
    }
}
