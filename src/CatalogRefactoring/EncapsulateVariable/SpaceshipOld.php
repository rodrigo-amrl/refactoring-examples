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
class SpaceshipOld
{

    public function __construct(
        public string $name,
        public  $default_owner = ['firstName' => "Martin", 'lastName' => "Fowler"]
    ) {
    }
}
