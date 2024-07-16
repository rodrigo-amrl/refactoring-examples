<?php

namespace App\CatalogRefactoring\RemoveSubclass;


/*
 Remove Subclass
#region Motivação
            As subclasses são úteis. Eles suportam variações na estrutura de dados e no comportamento
    polimórfico. Eles são uma boa maneira de programar por diferença. Mas à medida que um sistema de
    software evolui, as subclasses podem perder o seu valor à medida que as variações que suportam são
    movidas para outros locais ou completamente removidas. Às vezes, subclasses são adicionadas em
    antecipação a recursos que nunca acabam sendo construídos ou acabam sendo construídos de uma forma
    que não precisa das subclasses.
#endregion

Passos: 
1 - Use Substituir Construtor por Função de Fábrica (334) no construtor da subclasse.Se os clientes dos construtores usarem um campo de dados para decidir qual subclasse criar,
coloque essa lógica de decisão em um método de fábrica de superclasse.
2 - Se algum código for testado em relação aos tipos da subclasse, use a função Extract (106) no tipo
Machine Translated by Googletest e Move Function (198) para movê-lo para a superclasse. Teste após cada alteração.
3 - Crie um campo para representar o tipo de subclasse.
4 - Altere os métodos que se referem à subclasse para usar o novo campo de tipo.
5 - Exclua a subclasse.
5 - Teste
*/

class PersonRefactored
{

    public function __construct(
        protected string $name,
        protected string $gender_code
    ) {
    }
    public function getName()
    {
        return $this->name;
    }
    public function getGenderCode()
    {
        return $this->gender_code;
    }
    public static function createPerson(object $data)
    {

        switch ($data->gender) {
            case "M":
                return new PersonRefactored($data->name, 'M');
                break;
            case "F":
                return new PersonRefactored($data->name, "F");
                break;
            default:
                return new PersonRefactored($data->name, "X");
                break;
        }
    }
}
