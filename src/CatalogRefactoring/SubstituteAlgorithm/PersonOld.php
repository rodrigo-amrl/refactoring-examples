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

class PersonOld
{
    public function foundPerson($people)
    {
        for ($i = 0; $i < count($people); $i++) {
            if ($people[$i] === "Don")
                return "Don";
            if ($people[$i] === "John")
                return "John";
            if ($people[$i] === "Kent")
                return "Kent";
        }
        return '';
    }
}
