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
class Departament
{
    public function __construct(
        private string $charge_code,
        private string $manager
    ) {
    }
    public function getChargeCode()
    {
        return $this->charge_code;
    }
    public function setChargeCode($value)
    {
        $this->charge_code = $value;
    }
    public function getManager()
    {
        return $this->manager;
    }
    public function setManager($value)
    {
        $this->manager = $value;
    }
}
