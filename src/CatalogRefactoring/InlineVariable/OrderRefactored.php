<?php

namespace App\CatalogRefactoring\InlineVariable;

class OrderRefactored
{
   /**
    * Inline Variable
    * - Verificar se a expressão comunica mais que o nome, assim ficando reudundante 
    * a criação de uma variável ou função
    * Passos
    * - Verifique se a expressão não apresenta efeitos colaterais
    * - Se a variável ainda não estiver declaração imutável faça o teste
    * - Encontre a primeira referencia a variavel e substitua pela expressão
    * - Teste
    * - Continue substituindo as referências à variavel
    * - Remova a declaração e atribuição da variavel
    * - Teste
    */

    public function __construct(protected array $order)
    {
    }
    public function getQuantity()
    {
        return $this->order['quantity'];
    }
    public function getItemPrice()
    {
        return $this->order['item_price'];
    }
    public function getPrice()
    {
        return $this->getBasePrice() - $this->getDiscount();
    }
    private function getBasePrice()
    {
        return $this->getQuantity() * $this->getItemPrice();
    }
    private function getDiscount()
    {
        if ($this->hasDiscount()) return $this->getItemPrice() * 0.05;
        return 0;
    }
    private function hasDiscount()
    {
        return $this->getBasePrice() > 1000;
    }
}
