<?php

namespace App\CatalogRefactoring\IntroduceAssertion;

/*
  Introduce Assertion
  As Assertions são o último recurso para ajudar arastrear bug

  Passos:
    1- Quando você perceber que uma condição é considerada verdadeira, adicione uma afirmação para declará-la


Exemplo: Aqui está uma história simples de descontos. Um cliente pode receber uma taxa de desconto para aplicar a todas as
suas compras:
 */

class CustomerRefactored
{
    public function __construct(
        protected float|null $discount_rate = null
    ) {
    }
    public function ApplyDiscount($number)
    {
        if (empty($this->discount_rate)) return  $number;

        assert($this->discount_rate >= 0);
        return $number - ($this->discount_rate * $number);
    }
    public function setDiscountRate($value)
    {
        assert(empty($value) || $value >= 0);
        $this->discount_rate = $value;
    }
}
