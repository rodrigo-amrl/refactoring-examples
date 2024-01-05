<?php

namespace App\CatalogRefactoring\MoveFunction;

/**
 * Move Function
 * O cerne de um bom design de software é a sua modularidade
 * Passos
 * - Examine todos os elementos do programa usados pela função escolhida em seu contexto
 * atual. Considere se eles também deveriam mudar.
 * - Verifique se a função escolhida é um método polimórfico (envolve super e subclasses)
 * - Copie  função para o contexto de destino. Ajuste-o para caber em sua nova casa
 * - Descubra como fazer referência a função de destino no contexto de origem
 * - Transforme a função de origem em uma função de delegação
 * - Teste
 * - COnsidere Inline Function na função de origem
 */
class AccountOld
{
    public function __construct(
        private int $days_over_drawn,
        private array $type
    ) {
    }

    public function getBankCharge()
    {
        $result = 4.5;
        if ($this->days_over_drawn > 0) $result += $this->getOverDraftCharge();
        return $result;
    }
    public function getOverDraftCharge(): float
    {
        if ($this->type['is_premium']) {
            $base_charge = 10;
            if ($this->days_over_drawn <= 7)
                return $base_charge;
            else
                return $base_charge + ($this->days_over_drawn - 7) * 0.85;
        } else
            return $this->days_over_drawn * 1.75;
    }
}
