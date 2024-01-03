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
class OperatingPlanOld
{

    const TEMPERATURE_FLOOR = 20;
    const TEMPERATURE_CEILING = 40;

    public function __construct(private array $station)
    {
    }
    public function checkAlerts()
    {
        return $this->readingsOutsiDeRange($this->station, self::TEMPERATURE_FLOOR, self::TEMPERATURE_CEILING);
    }
    private function readingsOutsiDeRange($station, $min, $max)
    {
        return array_filter($station['readings'], fn ($r) => $r['temp'] < $min || $r['temp'] > $max);
    }
}
