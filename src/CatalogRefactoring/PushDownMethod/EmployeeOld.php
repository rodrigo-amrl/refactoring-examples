<?php

namespace App\CatalogRefactoring\PushDownMethod;


/*
Push Down Method
    Se um método for relevante apenas para uma subclasse (ou uma pequena proporção de
subclasses), removê-lo da superclasse e colocá-lo apenas na(s) subclasse(s) torna isso mais
claro. Só posso fazer essa refatoração se o chamador souber que está trabalhando com uma
subclasse específica — caso contrário, devo usar Substituir Condicional por Polimorfismo (272)
com algum comportamento placebo na superclasse.

Passos:
1 - Copie o método em cada subclasse que precisar dele
2 - Remova o método da superclasse.
3 - Teste
4 - Remova o método de cada superclasse que não precisa dele
5 - Teste
 */

class EmployeeOld
{
    protected float $amount;
    public function getQuota()
    {
        return $this->amount * 0.2;
    }
}
