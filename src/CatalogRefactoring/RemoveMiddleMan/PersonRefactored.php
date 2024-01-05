<?php

namespace App\CatalogRefactoring\RemoveMiddleMan;

/**
 * Remove Middle Man
 * - Crie um getter para o delegate
 * - Para cada uso de um método de delegação pelo cliente, substritua a chamada para o método
 * de delegação encadando por meio do acessador
 */
class PersonRefactored
{
    private $departament;
    public function __construct(
        private string $name
    ) {
        $this->departament = new Departament('R993', 'Rodrigo');
    }
    public function getName()
    {
        return $this->name;
    }
    public function getDepartament()
    {
        return $this->departament;
    }
    public function setDepartament(Departament $departament)
    {
        $this->departament = $departament;
    }
}
