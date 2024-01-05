<?php

namespace App\CatalogRefactoring\RemoveMiddleMan;

/**
 * Remove Middle Man
 * - Crie um getter para o delegate
 * - Para cada uso de um método de delegação pelo cliente, substritua a chamada para o método
 * de delegação encadando por meio do acessador
 */
class PersonOld
{
    private $departament;
    public function __construct(
        private string $name
    ) {
        $this->departament = new Departament('R993', $name);
    }
    public function getName()
    {
        return $this->name;
    }
    public function getManager()
    {
        return $this->departament->getManager();
    }
}
