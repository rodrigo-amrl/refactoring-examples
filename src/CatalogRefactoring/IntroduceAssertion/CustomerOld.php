<?php

namespace App\CatalogRefactoring\IntroduceAssertion;

/*
  Introduce Assertion
  Passos:
    1- Quando você perceber que uma condição é considerada verdadeira, adicione uma afirmação para declará-la


Exemplo: Aqui está uma história simples de descontos. Um cliente pode receber uma taxa de desconto para aplicar a todas as
suas compras:
 */

class CustomerOld
{
    public function __construct(
        protected float|null $discount_rate = null
    ) {
    }
    public function ApplyDiscount($number)
    {
        return !empty($this->discount_rate) ? $number - ($this->discount_rate * $number) : $number;
    }
    public function setDiscountRate($value)
    {
        $this->discount_rate = $value;
    }
}
