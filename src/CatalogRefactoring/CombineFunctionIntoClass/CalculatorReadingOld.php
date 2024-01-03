<?php

namespace App\CatalogRefactoring\CombineFunctionIntoClass;

use App\CatalogRefactoring\CombineFunctionIntoClass\Factories\ReadingFactory;

/**
 * Combine Functions Into Class
 * Usar uma classe torna mais explícito o ambiente comum que essas funções compartilham.
 * Passos
 * - Aplique Encapsulate Record, ao registor de dados comum que as funções compartilham
 * - Pegue cada função que usa o registro comum e use o Move Function, para movêlas para 
 * a nova classe.
 * - Cada bit de lógica que manipula os dados pode ser extraído com Extract Function, e depois 
 * movido para a nova classe
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
