<?php

namespace App\CatalogRefactoring\SubstituteAlgorithm;

/**
 * Substitute Algorithm 
 * Passos
 * - Organize o código a ser substituido para que ele preencha uma função completa.
 * - Prepare testes usando apenas esta função, para capturar seu comportamento
 * - Prepare seu algoritmo altenativo
 * - Execute verificações estáticas
 * - Execute teste para comparar a saida do algoritmo antigo com o novo.
 */

class PersonRefactored
{
    public function foundPerson($people)
    {
        $candidates = ["Don", "John", "Kent"];
        return reset(array_filter($people, fn ($p) => in_array($p, $candidates))) ?? '';
    }
}
