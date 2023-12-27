<?php

namespace App\CatalogRefactoring\InlineFunction;



/**
 * Inline Function
 * Passos: 
 * Verifique se este não é um método polifórmico (se tiver subclasses que o substituem)
 * Encontre todas as chamadores da função
 * Substitua cada chamada pelo corpo da função
 * Teste após cada substituição
 * Remova a definição da função
 */
class DriverRatingOld
{

    public function rating($aDriver)
    {
        return $this->moreThanFiveLateDeliveries($aDriver) ? 2 : 1;
    }
    private function moreThanFiveLateDeliveries($aDriver)
    {
        return $aDriver['numberOfLateDeliveries'] > 5;
    }
}
