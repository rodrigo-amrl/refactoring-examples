<?php


namespace App\CatalogRefactoring\ReplaceInlineCodeWithFunctionCall;

/**
 * REPLACE INLINE CODE WITH FUNCTION CALL
 * Passos
 * Substitua o código embutido por uma chamada para função existente
 * Teste
 */
class Refactored
{
    public function checkAppliesToMas($states)
    {
        return in_array("MA", $states);
    }
}
