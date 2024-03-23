<?php

namespace App\CatalogRefactoring\ReplaceLoopWithPipeline;

/**
 * Replace Loop With Pipeline
 * Pipeline fornece uma construção melhor que os loops comuns.
 * A lógica fica muito mais fácil se for expressa como um pipeline
 * Passos:
 * Crie uma nova variável para coleção do loop
 * Esta pode ser uma cópia simples de uma variável existente
 * Começando do topo, pegue cada bit de comportamento do loop e substitua-o por uma operação de pipeline de coleta na derivação da variável de coleta do loop. Teste após cada alteração.
 * Depois que todo o comportamento for removido do loop, remova-o.
 * Se for atribuído a um acumulador, atribua o resultado do pipeline ao acumulador.

 */
class Refactored
{
    public function acquireData($input)
    {
        $lines = explode('\n', $input);
        $slice_lines = array_slice($lines, 1);
        $only_lines_with_values = array_filter($slice_lines, fn ($line) => trim($line) !== "");
        $array_fields = array_map(fn ($line) => explode(",", $line), $only_lines_with_values);
        $only_country_india = array_filter($array_fields, fn ($field) => trim($field[1]) === "India");
        $result = array_map(fn ($field) => ['city' => trim($field[0]), 'phone' => trim($field[2])], $only_country_india);
        return array_values($result);
    }
}
