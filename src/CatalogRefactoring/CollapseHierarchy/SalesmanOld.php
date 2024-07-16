<?php

namespace App\CatalogRefactoring\CollapseHierarchy;

/*
Collapse Hierarchy
    Quando estou refatorando uma hierarquia de classes, muitas vezes estou puxando e empurrando recursos.
    À medida que a hierarquia evolui, às vezes descubro que uma classe e seu pai não são mais diferentes o suficiente para 
valer a pena mantê-los separados. Neste ponto, vou mesclá-los   

Passos:
1 - Escolha qual remover.Eu escolho com base em qual nome fará mais sentido no futuro. Se nenhum dos nomes for
melhor, escolherei um arbitrariamente
2 - Use Campo Pull Up (353), Campo Push Down (361), Método Pull Up (350) e Método Push
Down (359) para mover todos os elementos em uma única classe
3 - Ajuste quaisquer referências à vítima para alterá-las para a classe que permanecerá.
4 - Remova a classe vazia.
5 - Teste

*/

class SalesmanOld extends EmployeeOld
{

    public function __construct(
        string $name,
        protected float $salary
    ) {
        parent::__construct($name);
    }

    public function getAnnualSalary()
    {
        return $this->salary * 12;
    }
}
