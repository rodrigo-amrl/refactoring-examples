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
class Old
{
    public function acquireData($input)
    {
        $lines = explode('\n', $input);
        $firstLine = true;
        $result = [];

        foreach ($lines as $line) {

            if ($firstLine) {
                $firstLine = false;
                continue;
            }

            if (trim($line) === "") continue;

            $record = explode(",", $line);

            if (trim($record[1]) === "India") {

                $result[] = ['city' => trim($record[0]), 'phone' => trim($record[2])];
            }
        }
        return $result;
    }
}
