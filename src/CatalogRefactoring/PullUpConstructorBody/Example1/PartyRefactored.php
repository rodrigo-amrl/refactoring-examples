<?php

namespace App\CatalogRefactoring\PullUpConstructorBody\Example1;

/*
 Pull Up Constructor Body

  #region Motivação
        Construtores são coisas complicadas. Eles não são métodos muito normais – então estou
mais restrito no que posso fazer com eles.
Se eu vir métodos de subclasse com comportamento comum, meu primeiro pensamento é usar a
        Função Extract (106) seguida pelo Método Pull Up (350), que o moverá perfeitamente para a
superclasse. Os construtores confundem isso – porque eles têm regras especiais sobre o que pode ser
feito e em que ordem, então preciso de uma abordagem um pouco diferente.
Se essa refatoração começar a ficar confusa, procuro Substituir Construtor por Função de Fábrica (334).

 #endregion

Passos: 
1 - Defina um construtor de superclasse, se ainda não existir. Certifique-se de que seja chamado pelos
construtores da subclasse.
2 - Use as instruções do slide (223) para mover quaisquer instruções comuns para logo após a
superchamada.
3 - Remova o código comum de cada subclasse e coloque-o na superclasse. Adicione à superchamada
quaisquer parâmetros do construtor referenciados no código comum.
4 - Teste
5 - Se houver algum código comum que não possa ser movido para o início do construtor, use a
Função Extrair (106) seguida pelo Método Pull Up (350)


 */

class PartyRefactored
{
        protected string $status;
        public function __construct(
                protected string $name
        ) {
                $this->status = "active";
        }

        public function getName()
        {
                return $this->name;
        }
}
