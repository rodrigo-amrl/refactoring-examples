<?php

namespace App\CatalogRefactoring\ReplaceDerivedVariableWithQuery;

/**
 * Replace Derived Variable With Query
 * Uma das maiores fontes de problemas em software são os dados mutáveis. 
 * 
 * Passos:
 * 1 - dentifique todos os pontos de atualização da variável. Se necessário, use Split Variable para separar cada ponto de atualização
 * 2 - Crie uma função que calcule o valor da variável.
 * 3 - Use Introduzir Assertion para afirmar que a variável e o cálculo fornecem o mesmo resultado sempre que a variável é usada
 * se necessário, use Encapsulate Variable para fornecer um local para o Assert
 * 4 - Test
 * 5 - Substitua qualquer leitor da variável por uma chamada para a nova função
 * 6 - Teste
 * 7 - Aplique Remove Dead Code (237) à declaração e atualize a variável
 */
class ProductionPlanOld
{

    private array $adjustments = [];
    public function __construct(
        private float $production
    ) {
    }

    public function getProduction()
    {
        return $this->production;
    }
    public function ApplyAdjustment($an_adjustment)
    {
        $this->adjustments[] = $an_adjustment;
        $this->production += $an_adjustment['amount'];
    }
}
