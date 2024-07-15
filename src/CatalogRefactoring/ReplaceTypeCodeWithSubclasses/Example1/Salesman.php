<?php

namespace App\CatalogRefactoring\ReplaceTypeCodeWithSubclasses\Example1;

use Exception;

/*
Replace Type Code With Subclasses
#region Motivação
            Os sistemas de software geralmente precisam representar diferentes tipos de coisas semelhantes.
    Posso classificar os funcionários por tipo de trabalho (engenheiro, gerente, vendedor) ou os pedidos por
    prioridade (urgente, regular). Minha primeira ferramenta para lidar com isso é algum tipo de campo de código de tipo
    dependendo do idioma, pode ser um enum, símbolo, string ou número. Muitas vezes, esse tipo de código virá de
    um serviço externo que me fornece os dados nos quais estou trabalhando.
            Na maioria das vezes, esse tipo de código é tudo que preciso. Mas há algumas situações em que eu poderia
    fazer algo mais, e esse algo mais são subclasses. Há duas coisas que são particularmente atraentes nas subclasses.
    Primeiro, eles me permitem usar polimorfismo para lidar com lógica condicional. Acho isso mais útil quando tenho
    várias funções que invocam comportamentos diferentes dependendo do valor do código do tipo. Com
    subclasses, posso aplicar Substituir Condicional por Polimorfismo (272) para essas funções.
            O segundo caso é onde tenho campos ou métodos que são válidos apenas para valores específicos de um
    código de tipo, como uma cota de vendas aplicável apenas ao código de tipo “vendedor”. Posso então criar a
    subclasse e aplicar Push Down Field (361). Embora eu possa incluir lógica de validação para garantir que um
    campo seja usado apenas quando o código do tipo tiver o valor correto, o uso de uma subclasse torna o relacionamento
    mais explícito.
            Ao usar Substituir código de tipo por subclasses, preciso considerar se devo aplicá-lo diretamente à classe que estou
    vendo ou ao próprio código de tipo. Devo tornar o engenheiro um subtipo de funcionário ou devo dar ao
    funcionário uma propriedade de tipo de funcionário que possa ter subtipos para engenheiro e gerente? Usar a
    subclasse direta é mais simples, mas não posso usá-la para o tipo de trabalho se precisar dela para outra coisa.
            Também não posso usar subclasses diretas se o tipo for mutável. Se eu precisar mover as subclasses
    para uma propriedade de tipo de funcionário, posso fazer isso usando Substituir Primitivo por Objeto (174) no
    código de tipo para criar uma classe de tipo de funcionário e, em seguida, usando Substituir Código de Tipo por
    Subclasses em aquela nova classe.

#endregion
 
Passos:
1 - Autoencapsular o campo de código de tipo.
2 - Escolha um valor de código de tipo. Crie uma subclasse para esse código de tipo. Substitua o getter
do código de tipo para retornar o valor literal do código de tipo.
3 - Crie uma lógica de seletor para mapear do parâmetro de código de tipo para a nova subclasse.Com herança direta, use Substituir Construtor por Função de Fábrica (334) e
coloque a lógica do seletor na fábrica. Com herança indireta, a lógica do seletor
pode permanecer no construtor.
4 - Teste
5 - Repita a criação da subclasse e a adição à lógica do seletor para cada valor de código
de tipo. Teste após cada alteração.
6 - Remova o campo do código do tipo.
7 - Teste
8 - Use Método Push Down (359) e Substitua Condicional por Polimorfismo (272) em quaisquer métodos que
usem os acessadores de código de tipo. Depois que todos forem substituídos, você poderá remover
os acessadores do código de tipo

*/

class Salesman extends EmployeeRefactored
{

        public function getType()
        {
                return "salesman";
        }
        public function toString()
        {
                return $this->name . " ({$this->getType()})";
        }
}
