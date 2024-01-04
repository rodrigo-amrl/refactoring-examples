<?php

namespace App\CatalogRefactoring\CombineFunctionIntoTransform;

use App\CatalogRefactoring\CombineFunctionIntoClass\Factories\ReadingFactory;

/**
 * Combine Function into Transform
 * Passos
 * - Crie uma função de transformação que leva o registro  a ser transformado e retorna
 * os mesmos valores.
 * - Escolha uma lógica e mova seu corpa para a transformação para criar um novo campo no registro.
 * Altere o código do cliente para acessar o novo campo.
 * - Teste
 * - Repita para outrsa funções relevantes
 */
class CalculatorReadingOld
{
    public function getBaseCharge()
    {
        $reading = ReadingFactory::make();
        $base_charge = $this->baseRate($reading['month'], $reading['year']) * $reading['quantity'];
        return $base_charge;
    }
    private function baseRate($month, $year)
    {
        return $month / $year;
    }
    public function getTaxableCharge()
    {
        $reading = ReadingFactory::make();
        $base = $this->baseRate($reading['month'], $reading['year']) * $reading['quantity'];
        $taxable_charge = max(0, $base - $this->taxThreshold($reading['year']));
        return $taxable_charge;
    }
    private function taxThreshold($year)
    {
        return $year > 2023 ? 0.5 : 0.2;
    }
}
