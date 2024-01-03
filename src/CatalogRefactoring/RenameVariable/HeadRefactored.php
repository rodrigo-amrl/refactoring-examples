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
class HeadRefactored
{
    private string $title = "untitled";
    private string $subtitle = "untitled";
    private string $response = "";

    public function mountHtml()
    {
        $this->response .= "<h1>{$this->getTitle()}</h1>";
        $this->response .= "<h5>{$this->getSubTitle()}</h5>";
        return $this->response;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function getSubTitle()
    {
        return $this->subtitle;
    }
    public function setSubTitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }
}
