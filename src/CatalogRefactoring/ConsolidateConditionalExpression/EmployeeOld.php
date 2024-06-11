<?php

namespace App\CatalogRefactoring\ConsolidateConditionalExpression;

/**
 * Consolidate Conditional Expression
 * 
 * s vezes, me deparo com uma série de verificações condicionais em que cada verificação é
 * diferente, mas a ação resultante é a mesma. Quando vejo isso, uso os operadores and e
 * or para consolidá-los em uma única verificação condicional com um único resultado.
 * 
 * Passos:
 * 1- Certifique que nenhuma das condicionais tenha efeitos colaterais
 * se houver, use  Separate Query from Modifier neles primeiro
 * 2- Pegue duas das declarações condicionais e combine suas condições usando uma lógica operador
 * 3 - Teste
 */
class EmployeeOld
{

    public function disabilityAmount($employee)
    {

        if ($employee['seniority'] < 2) return 0;
        if ($employee['months_disabled'] > 12) return 0;
        if ($employee['is_part_time']) return 0;

        //compute the disability amount....
    }
}
