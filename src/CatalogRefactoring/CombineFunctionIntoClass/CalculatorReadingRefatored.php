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
class CalculatorReadingRefatored
{
    public function getBaseCharge()
    {
        $reading = new Reading(...ReadingFactory::make());
        return $reading->baseCharge();
    }
    public function getTaxableCharge()
    {
        $reading = new Reading(...ReadingFactory::make());
        return $reading->taxableCharge();
    }
}
