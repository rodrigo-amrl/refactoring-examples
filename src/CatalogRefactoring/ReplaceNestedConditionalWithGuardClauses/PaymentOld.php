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
class PaymentOld
{

    public function payAmount($employee)
    {

        $result = null;

        if ($employee['is_separated']) {
            $result = ['amount' => 0, 'reason_code' => "SEP"];
        } else {
            if ($employee['is_retired']) {
                $result = ['amount' => 0, 'reason_code' => "RET"];
            } else {
                // logic to compute amount
            }
        }

        return $result;
    }
}
