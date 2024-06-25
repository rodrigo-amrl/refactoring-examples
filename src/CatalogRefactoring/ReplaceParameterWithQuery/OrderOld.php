<?php

namespace App\CatalogRefactoring\ReplaceParameterWithQuery;

/*
Replace Parameter WithQuery
A lista de parâmetros de uma função deve resumir os pontos de variabilidade dessa função,
indicando as principais formas pelas quais essa função pode se comportar de maneira diferente.
Como acontece com qualquer instrução no código, é bom evitar duplicações e é mais fácil
de entender se a lista de parâmetros for curta.

Passos: 
1 - Se necessário, utilize a Função Extrair (106) no cálculo do parâmetro
2 - Substitua as referências ao parâmetro no corpo da função por referências à
expressão que produz o parâmetro. Teste após cada alteração
3 - Use Declaração de Função de Alteração (124) para remover o parâmetro

*/

class OrderOld
{
    public function __construct(
        protected int $quantity,
        protected float $item_price
    ) {
    }

    public function finalPrice()
    {
        $base_price = $this->quantity * $this->item_price;
        $discount_level = ($this->quantity > 100) ? 2 : 1;
        return $this->discountedPrice($base_price, $discount_level);
    }

    private function discountedPrice($base_price, $discount_level)
    {
        switch ($discount_level) {
            case 1:
                return round($base_price * 0.95, 2);
            case 2:
                return round($base_price * 0.9, 2);
        }
    }
}
