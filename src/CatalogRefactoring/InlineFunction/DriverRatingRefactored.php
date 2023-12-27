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
class DriverRatingRefactored
{

    public function rating($aDriver)
    {
        return $aDriver['number_of_late_deliveries'] > 5 ? 2 : 1;
    }
}
