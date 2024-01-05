<?php

namespace App\CatalogRefactoring\ExtractClass;

/**
 *  ExtractClass
 * Conforme a classe vai crescendo é necessário a extração de classes.
 * Um teste últil é se perguntar o que aconteceria se eu removesse esse dado ou método?
 * que outros campos e métodos se tornariam absurdos?
 * Passos
 * - Decida como dividir as responsabilidades da classe
 * - Crie uma nova classe filha para expressar as responsabilidades divididas
 * - Crie uma instância da classe filha ao construir a classe pai e adicione um link de pai para filho.
 * - Use MOve Field em cada campo que você deseja mover.
 * - Use move function para mover métodos para o novo filho. Comece com métodos de nível inferior (aqueles
 * que estão sendo chamados em vez chamar )
 * - Revise as interfaces de ambas as classes, remova métodos desnecessários, altere nomes para melhor atender 
 * as novas circunstâncias.
 * - Decida se deseja expor a nova classe filha. Nesse caso, considere aplicar Change Reference to value, a classe filha.
 */
class PersonRefactored
{
    private $telefoneNumber;

    public function __construct(
        private string $name,
        int $office_area_code,
        string $office_number

    ) {
        $this->telefoneNumber = new TelefoneNumber($office_area_code, $office_number);
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getTelephoneNUmber()
    {
        return $this->telefoneNumber->toString();
    }
    public function getOfficeAreaCode()
    {
        return $this->telefoneNumber->getAreaCode();
    }
    public function setOfficeAreaCode($office_area_code)
    {
        $this->telefoneNumber->setAreaCode($office_area_code);
    }
    public function getOfficeNumber()
    {
        return $this->telefoneNumber->getNumber();
    }
    public function setOfficeNumber($office_number)
    {
        $this->telefoneNumber->setNumber($office_number);
    }
}
