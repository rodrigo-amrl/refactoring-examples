<?php

namespace App\CatalogRefactoring\MoveField\Customer;

/**
 * Move Field
 * Programar envolve escrever muito código que implementa comportamento, mas 
 * a força de um programa está realmente baseada em suas estruturas de dados.
 * Passos
 * - Certifique-se de que o campo de origem esteja encapsulado
 * - Teste
 * - Crie um campo (e acessadores) no destino
 * - Certifique-se de que haja uma referência do objeto de origem para o objeto de destino
 * - Ajude os acesasdores para usar o campo de destino
 * - Teste
 * - Remova o campo de origem
 */

class CustomerOld
{
    private $contract;

    public function __construct(
        private string $name,
        private float $discount_rate
    ) {
        $this->contract = new CustomerContract(date('Y-m-d'));
    }
    public function getDiscountRate()
    {
        return $this->discount_rate;
    }
    public function becomePreferred()
    {
        return $this->discount_rate += 0.03;
    }
    public function ApplyDiscount($amount)
    {
        return $amount->subtract($amount->multiply($this->discount_rate));
    }
}
