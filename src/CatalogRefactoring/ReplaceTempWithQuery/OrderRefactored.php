<?php

namespace App\CatalogRefactoring\ReplaceTempWithQuery;

/**
 * Replace Temp With Query
 * Passos
 * - Verifique se a variável é totalmente determinada antes de ser usada e se o códgi que a calcula não
 * produz um valor diferente sempre que é usada.
 * - Se a variável não for somente leitura e puder ser somente leitura, altere.
 * - Teste
 * - Exraia a atribuição da variável em uma função
 * Use Inline Variable para remover a temp
 */
class OrderRefactored
{

    public function __construct(
        private int $quantity,
        private array $item
    ) {
    }
    public function getPrice()
    {
        return round($this->basePrice() * $this->discountFactor(), 2);
    }
    private function basePrice()
    {
        return  $this->quantity * $this->item['price'];
    }
    private function discountFactor()
    {
        $discount_factor = 0.98;
        if ($this->basePrice() < 1000) $discount_factor -= 0.03;
        return $discount_factor;
    }
}
