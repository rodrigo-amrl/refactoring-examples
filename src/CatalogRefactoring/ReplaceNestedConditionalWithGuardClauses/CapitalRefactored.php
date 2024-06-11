<?php

namespace App\CatalogRefactoring\ReplaceNestedConditionalWithGuardClauses;

/**
 * Replace Nested Conditional With Guard Clauses
 * 
 * Passos:
 * 1- Selecione a condição mais externa que precisa ser substituída e transforme-a em uma proteção cláusula
 * 2- Teste
 * 3 - Repida conforme necessário
 * 4 - Se todas as cláusulas de guarda retornarem o mesmo resultado, use Consolidate Conditional Expression
 */
class CapitalRefactored
{
    public function adjustedCapital($instrument)
    {
        if ($instrument['capital'] <= 0 || $instrument['interest_rate'] <= 0 && $instrument['duration'] <= 0) return 0;
        return ($instrument['income'] / $instrument['duration']) * $instrument['adj'];
    }
}
