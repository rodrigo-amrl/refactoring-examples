<?php


namespace App\CatalogRefactoring\ReplaceInlineCodeWithFunctionCall;

/**
 * REPLACE INLINE CODE WITH FUNCTION CALL
 * Passos
 * Substitua o código embutido por uma chamada para função existente
 * Teste
 */
class Old
{
    public function checkAppliesToMas($states)
    {
        $appliesToMass = false;
        foreach ($states as $s) {
            if ($s == "MA") $appliesToMass = true;
        }

        return $appliesToMass;
    }
}
