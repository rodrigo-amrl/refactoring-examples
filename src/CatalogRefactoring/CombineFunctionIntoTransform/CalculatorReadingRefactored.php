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
class CalculatorReadingRefactored
{
    public function getBaseCharge()
    {
        $reading = $this->enrichReading(ReadingFactory::make());
        return $reading['base_charge'];
    }
    public function getTaxableCharge()
    {
        $reading = $this->enrichReading(ReadingFactory::make());
        return $reading['taxable_charge'];
    }
    private function enrichReading($reading)
    {
        $reading['base_charge'] = $this->calculateBaseCharge($reading);
        $reading['taxable_charge'] = max(0, $reading['base_charge'] - $this->taxThreshold($reading['year']));
    }
    private function calculateBaseCharge(array $reading)
    {
        return $this->baseRate($reading['month'], $reading['year']) * $reading['quantity'];
    }
    private function baseRate($month, $year)
    {
        return $month / $year;
    }
    private function taxThreshold($year)
    {
        return $year > 2023 ? 0.5 : 0.2;
    }
}
