<?php

namespace App\CatalogRefactoring\HideDelegate;

/**
 * Hide Delegate
 * A chave para um bom desigin modular é o encapsulamento.
 * Passos
 * - Exemplo: Class Cliente -> Class Server (){function aMethod(){delegate.aMethod}}-> class Delegate(){funcion amethod()}
 * - Para cada método no delegado, crie um método de delegação simples no servidor
 * - Ajuste o cliente para chamar o servidor
 * - Se nenhum cliente precisar mais acesar o delegado, remova o acessador do servidor para o delegado.
 */
class PersonOld
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
    //bad: $person->getDepartament()->getManager();
    public function getDepartament()
    {
        return $this->departament;
    }
    public function setDepartament(Departament $departament)
    {
        $this->departament = $departament;
    }
}
