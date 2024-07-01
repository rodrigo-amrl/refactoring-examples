<?php

namespace App\CatalogRefactoring\ReplaceConstructorWithFactoryFunction;
/* 
Replace Constructor With Factory Function

#region Motivação
Muitas linguagens orientadas a objetos possuem uma função construtora especial que é chamada para inicializar um objeto.
Os clientes normalmente chamam esse construtor quando desejam criar um novo objeto. Mas esses construtores geralmente vêm com 
limitações estranhas que não existem para funções mais gerais. Um construtor Java deve retornar uma instância da classe
com a qual foi chamado, o que significa que não posso substituí-lo por uma subclasse ou proxy dependendo do ambiente ou dos parâmetros.
A nomenclatura do construtor é fixa, o que impossibilita o uso de um nome mais claro que o padrão. Os construtores geralmente exigem
a invocação de um operador especial (“novo” em muitas linguagens), o que os torna difíceis
de usar em contextos que esperam funções normais.
Uma função de fábrica não sofre tais limitações. Provavelmente chamará o construtor como
parte de sua implementação, mas posso substituir livremente por outra coisa.
#endregion

Passos:
1 - Crie uma função de fábrica, cujo corpo seja uma chamada ao construtor
2 - Substitua cada chamada ao construtor por uma chamada à função de fábrica.
3 - Teste após cada alteração
4 - Limite a visibilidade do construtor tanto quanto possível


*/

class CanditateRefactored
{
    private EmployeeOld $candidate;
    public function __construct()
    {
    }
    public function createCandidate(string $name, string $type_code)
    {
        $this->candidate = new EmployeeOld($name,  $type_code);
    }
    public function getCanditate()
    {
        return $this->candidate;
    }
}
