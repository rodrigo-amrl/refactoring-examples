<?php

namespace App\CatalogRefactoring\SplitPhase;

/**
 * SplitPhase
 * Quando houver um códig que lida com duas coisas diferentes deve procurar
 * uma maneira de dividi-lo em fases
 * Passos
 * - Extraia o código da segunda fase em sua própria função
 * - teste
 * - Introduza uma estrutura de dados intermediária como um argumento adicionanal para a função extraida.
 * - Teste
 * - $xamina cada parâmetro da segunda fase extraída se for usad pela primera fase, mova-o para a estrutura de 
 * dados intermediária. 
 * - Aplique Extract Function no código da primeira fase, retornando a estrutura de dados intermediária.
 */
class OrderOld
{

    public function priceOrder($product, $quantity, $shipping_method)
    {
        $base_price = $product['base_price'] * $quantity;
        $discount = max($quantity - $product['discount_threshold'], 0) * $product['base_price'] * $product['discount_rate'];
        $shipping_per_case = ($base_price > $shipping_method['discount_threshold']) ? $shipping_method['discounted_fee'] : $shipping_method['fee_per_case'];
        $shipping_cost = $quantity * $shipping_per_case;
        $price = $base_price - $discount + $shipping_cost;

        return $price;
    }
}
