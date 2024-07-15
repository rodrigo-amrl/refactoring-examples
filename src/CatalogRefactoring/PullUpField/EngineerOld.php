<?php

namespace App\CatalogRefactoring\PullUpField;

/*
Pull Up Field
#region Motivação
            Se as subclasses forem desenvolvidas de forma independente ou combinadas por meio de refatoração,
    muitas vezes descubro que elas duplicam recursos. Em particular, determinados campos podem ser
    duplicados. Às vezes, esses campos têm nomes semelhantes, mas nem sempre. A única maneira de saber o
    que está acontecendo é observando os campos e examinando como eles são usados. Se eles estiverem sendo
    usados de maneira semelhante, posso colocá-los na superclasse.
            Inspecione todos os usuários do campo candidato para garantir que sejam usados da mesma maneira.
    Ao fazer isso, reduzo a duplicação de duas maneiras. Eu removo a declaração de dados duplicados e posso
    então mover o comportamento que usa o campo das subclasses para a superclasse.
            Muitas linguagens dinâmicas não definem campos como parte de sua definição de classe; em vez disso, os
    campos aparecem quando são atribuídos pela primeira vez. Neste caso, puxar um campo para cima é
    essencialmente uma consequência de Pull Up Constructor Body (355)
#endregion

Passos: 
1 - Inspecione todos os usuários do campo candidato para garantir que sejam usados da mesma maneira.
2 - Se os campos tiverem nomes diferentes, use Renomear Campo (244) para dar-lhes o mesmo nome.
3-  Crie um novo campo na superclasse. O novo campo precisará ser acessível às subclasses (protegido em linguagens comuns)
4 - Exclua os campos da subclasse.
5 - Teste


*/

class EngineerOld
{
    public function __construct(
        protected string $name,
        protected string $code
    ) {
    }
    public function getName()
    {
        return $this->name;
    }
}
