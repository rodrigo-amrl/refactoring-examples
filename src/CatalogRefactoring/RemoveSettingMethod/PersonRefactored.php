<?php

namespace App\CatalogRefactoring\RemoveSettingMethod;


/*
Remove Setting Method
Fornecer um método de configuração indica que um campo pode ser alterado. Se eu não quiser
que esse campo mude depois que o objeto for criado, não forneço um método de configuração (e
torno o campo imutável). Dessa forma, o campo é definido apenas no construtor, minha intenção de
não alterá-lo fica clara e geralmente removo a própria possibilidade de o campo mudar.

Passos: 
1 - Use Change Function Statement (124) para adicioná-lo. Adicione uma chamada ao método de configuração dentro do construtor.
Se você deseja remover vários métodos de configuração, adicione todos os seus valores
ao construtor de uma só vez. Isso simplifica as etapas posteriores
2 - Remova cada chamada de um método de configuração fora do construtor, usando o novo valor do construtor. Teste depois de cada um
Se você não puder substituir a chamada ao setter criando um novo objeto (porque você está
atualizando um objeto de referência compartilhado), abandone a refatoração
3 - Use a Função Inline (115) no método de configuração. Torne o campo imutável, se possível
4 - Teste
*/

class PersonRefactored
{
    private string $name;
    public function __construct(
        private int $id
    ) {
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($value)
    {
        $this->name = $value;
    }
    public function getId()
    {
        return $this->id;
    }
}
