<?php

namespace App\CatalogRefactoring\EncapsulateVariable;


/**
 * Encapsulate Variable
 * Passos
 *  - Crie funções de encapsulamento para acessar e atualizar a variavel
 *  - Execute verificações estáticas
 *  - Para cada referência à variavel, substitua por uma chamada para a função de encapsulamento.
 *  - Restrinja a visibulidade da variável
 *  - Teste
 */
class SpaceshipRefactored
{
    private array $default_owner = ['firstName' => "Martin", 'lastName' => "Fowler"];

    public function __construct(
        private string $name
    ) {
    }
    public function getDefaultOwner()
    {
        return $this->default_owner;
    }
    public function setDefaultOwer(array $default_owner)
    {
        $this->default_owner = $default_owner;
    }
}
