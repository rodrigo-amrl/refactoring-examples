<?php


namespace App\CatalogRefactoring\ReplaceFunctionWithCommand;

/* 
Replace Function With Command

#region Motivação
Funções – independentes ou anexadas a objetos como métodos – são um dos blocos de
construção fundamentais da programação. Mas há momentos em que é útil encapsular uma função
em seu próprio objeto, ao qual me refiro como “objeto de comando” ou simplesmente um comando.
Tal objeto é construído principalmente em torno de um único método, cuja solicitação e execução
são o propósito do objeto.
Um comando oferece maior flexibilidade para o controle e expressão de uma função do que o
mecanismo de função simples. Os comandos podem ter operações complementares, como desfazer.
Posso fornecer métodos para construir seus parâmetros para oferecer suporte a um ciclo de vida mais
rico. Posso criar personalizações usando herança e ganchos. Se estou trabalhando em uma
linguagem com objetos, mas sem funções de primeira classe, posso fornecer grande parte dessa
capacidade usando comandos. Da mesma forma, posso usar métodos e campos para ajudar a
decompor uma função complexa, mesmo em uma linguagem que não possui funções aninhadas,
e posso chamar esses métodos diretamente durante o teste e a depuração.
Todas essas são boas razões para usar comandos, e preciso estar pronto para refatorar
Machine Translated by GoogleMecânica
Mantenha a função original como função de encaminhamento pelo menos até o final da
refatoração.
Siga qualquer convenção que a linguagem tenha para nomear comandos. Se não houver
convenção, escolha um nome genérico para a função de execução do comando, como
“executar” ou “chamar”.
A linguagem JavaScript tem muitas falhas, mas uma de suas grandes decisões foi tornar as
funções entidades de primeira classe. Portanto, não preciso passar por todos os trabalhos de
criação de comandos para tarefas comuns que preciso realizar em linguagens sem esse recurso.
Mas ainda há momentos em que um comando é a ferramenta certa para o trabalho.
Considere criar um campo para cada argumento e mover esses argumentos para o
Use Move Function (198) para mover a função para a classe vazia.
Um desses casos é quebrar uma função complexa para que eu possa entendê-la e modificá-la
melhor. Para realmente mostrar o valor dessa refatoração, preciso de uma função longa e
complicada — mas que levaria muito tempo para ser escrita, e muito menos para você ler. Em vez
disso, optarei por uma função curta o suficiente para não precisar dela. Este marca pontos
para uma aplicação de seguro:
construtor.
funções em comandos quando preciso. Mas não devemos esquecer que esta flexibilidade, como
sempre, tem um preço pago pela complexidade. Portanto, dada a escolha entre uma função de
primeira classe e um comando, escolherei a função 95% das vezes. Eu só uso um comando quando
preciso especificamente de um recurso que abordagens mais simples não podem fornecer.
Como muitas palavras no desenvolvimento de software, “comando” está bastante sobrecarregado.
No contexto que estou usando aqui, é um objeto que encapsula uma requisição, seguindo o
padrão de comando em Design Patterns [gof]. Quando uso “comando” nesse sentido, uso “objeto de
comando” para definir o contexto e “comando” depois. A palavra “comando” também é
usada no princípio de separação de consulta de comando [mfcqs], onde um comando é um método
de objeto que altera o estado observável. Sempre tentei evitar usar comando nesse sentido,
preferindo “modificador” ou “mutador”
#endregion

Passos:
1 - Crie uma classe vazia para a função. Nomeie-o com base na função.
2 - Use Move Function (198) para mover a função para a classe vazia.Mantenha a função original como função de encaminhamento pelo menos até o final da
refatoração. Siga qualquer convenção que a linguagem tenha para nomear comandos. Se não houver convenção, 
escolha um nome genérico para a função de execução do comando, como “execute” ou "call"
3 -Considere criar um campo para cada argumento e mover esses argumentos para o construtor



*/

class Scorer
{

    private float $result = 0;
    private float $health_level = 10;
    private bool $high_medical_risk_flag = false;
    private string $certification_grade = "regular";
    public function __construct(
        protected object $candidate,
        protected object $medical_exam
    ) {
    }
    function execute()
    {
        $this->scoreSmoking();
        if ($this->stateWithLowCertification($this->candidate->origin_state)) {
            $this->certification_grade = "low";
            $this->result -= 5;
        }
        $this->result = max($this->health_level - 5, 0);
        return  $this->result;
    }
    private function scoreSmoking()
    {
        if ($this->medical_exam->is_smoker) {
            $this->health_level -= 6;
            $this->high_medical_risk_flag = true;
        }
    }
    function stateWithLowCertification($state)
    {
        return in_array($state, ['NT', 'SS', 'PA', 'MT', 'NA']);
    }
}
