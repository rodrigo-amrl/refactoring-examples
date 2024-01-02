<?php

namespace App\CatalogRefactoring\ExtractVariable;

/**
 * Extract Variable
 * Passos
 * - Certifique que a expressão que deseja extrair não tenha efeitos colaterais
 * - Declare uma variável imutavel, uma cópia da expressão que deseja nomear.
 * - Substitua a expresão original
 * - Teste
 */
class OrderRefactored
{

    public function __construct(protected array $data)
    {
    }

    public function getQuantity()
    {
        return $this->data['quantity'];
    }
    public function getItemPrice()
    {
        return $this->data['item_price'];
    }
    public function getPrice()
    {
        return  $this->getBasePrice() - $this->getQuantityDiscount() + $this->getShipping();
    }
    //caso o contexto não fosse de uma classe específica poderia aplicar esse formato.
    public function getPriceVariables()
    {
        $base_Price = $this->getQuantity() * $this->getItemPrice();
        $quantity_discount = max(0, $this->getQuantity() - 500) * $this->getItemPrice();
        $shipping = min($this->getQuantity() * $this->getItemPrice() * 0.1, 100);
        return $base_Price - $quantity_discount + $shipping;
    }
    private function getBasePrice()
    {
        return $this->getQuantity() * $this->getItemPrice();
    }
    private function getQuantityDiscount()
    {
        return max(0, $this->getQuantity() - 500) * $this->getItemPrice() * 0.05;
    }
    private function getShipping()
    {
        return min($this->getQuantity() * $this->getItemPrice() * 0.1, 100);
    }
}
