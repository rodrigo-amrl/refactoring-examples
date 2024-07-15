<?php

namespace App\CatalogRefactoring\PushDownField;


/*
Push Down Field
    Se um campo for usado apenas por uma subclasse (ou por uma pequena proporção de subclasses), eu o movo para
essas subclasses

Passos:
1 - Declare o campo em todas as subclasses que precisam dele.
2 - Remova o campo da superclasse.
3 - Teste
4 - Remova o campo de todas as subclasses que não precisam dele.
5 - Teste
 */

class EnginnerOld extends EmployeeOld
{
    public function getQuota()
    {
        return $this->amount * 0.2;
    }
}
