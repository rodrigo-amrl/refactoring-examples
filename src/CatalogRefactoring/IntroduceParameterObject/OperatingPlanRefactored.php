<?php

namespace App\CatalogRefactoring\IntroduceParameterObject;

/**
 * Introduce Parameter Object
 * Agrupar os dados em uma estrutura é valioso porque torna explícito o relacionamento entre os itens.
 * Passos
 * - Se ainda não existe uma estrutura adequada(clase), crie uma
 * - Teste
 * - Use Change Function Declaration, para adicionar um parâmetro para a nova estrutura.
 * - Teste
 * - AJute cada chamador para passar a instância correta da nova estrutura
 *  - Para cada elemento da nova estrutura, substitua o uso do parâmetro original pelo
 *    elemento da estrutura. Remova o parâmetro.
 * - Teste
 */
class OperatingPlanRefactored
{

    const TEMPERATURE_FLOOR = 0;
    const TEMPERATURE_CEILING = 40;

    public function __construct(private array $station)
    {
    }
    public function checkAlerts()
    {
        $range = new NumberRange(self::TEMPERATURE_FLOOR, self::TEMPERATURE_CEILING);
        return $this->readingsOutsiDeRange($this->station, $range);
    }
    private function readingsOutsiDeRange($station, NumberRange $range)
    {
        return array_filter($station['readings'], fn ($r) => !$range->contains($r['temp']));
    }
}
