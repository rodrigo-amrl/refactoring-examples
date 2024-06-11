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
class PaymentRefactored
{

    public function payAmount($employee)
    {
        if ($employee['is_separated']) return ['amount' => 0, 'reason_code' => "SEP"];
        if ($employee['is_retired']) return ['amount' => 0, 'reason_code' => "RET"];

        // logic to compute amount
    }
}
