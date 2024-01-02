<?php

namespace App\CatalogRefactoring\ChangeFunctionDeclaration;

class CustomerRefactored
{

    /**
     * ChangeFunctionDeclaration
     * - Para este exemplo foi trocado o parametro de customers para incluir diretamente o
     * dado que precisava que é o código do estado.
     * Também foi alterado o nome da função para ficar mais claro o que a função realmente faz.
     * Passos
     * - Alterar a nome da função ou Incluir/alterar parametros
     * - Encontrar e adaptar as chamadas da função
     * - testar
     */
    public function __construct(protected array $customers)
    {
    }
    public function getNewEnglanders(): array
    {
        return array_filter($this->customers, fn($customer)=> $this->isNewEngland($customer['address']['state_code']));
    }
    private function isNewEngland($state_code)
    {
        return in_array($state_code, ["MA", "CT", "ME", "VT", "NH", "RI"]);
    }
}
