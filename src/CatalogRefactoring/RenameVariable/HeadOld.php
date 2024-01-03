<?php

namespace App\CatalogRefactoring\RenameVariable;

/**
 * Rename Variable
 * Nomear bem as coisas é o cerne de uma programação clara.
 * Passos
 * - Se a variável for amplamente utilizada, considere Encapsulate Variable
 * - Encontre todas as referências a variavel e altere cada uma delas.
 * - Teste
 */
class HeadOld
{
    public string $tphd = "untitled";
    public string $stphd = "untitled";
    private string $res = "";

    public function mountHtml()
    {
        $this->res .= "<h1>{$this->tphd}</h1>";
        $this->res .= "<h5>{$this->stphd}</h5>";
        return $this->res;
    }

}
