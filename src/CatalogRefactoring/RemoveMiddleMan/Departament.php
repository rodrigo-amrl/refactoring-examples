<?php

namespace App\CatalogRefactoring\RemoveMiddleMan;

/**
 * Remove Middle Man
 * - Crie um getter para o delegate
 * - Para cada uso de um método de delegação pelo cliente, substritua a chamada para o método
 * de delegação encadando por meio do acessador
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
