<?php


namespace App\CatalogRefactoring\ReplaceSubclassWithDelegate\Example1;

/*
Replace Subclass With Delegate
    #region Motivação
                Se eu tiver alguns objetos cujo comportamento varia de categoria para categoria, o mecanismo
        natural para expressar isso é a herança. Coloquei todos os dados e comportamentos comuns na
        superclasse e deixei cada subclasse adicionar e substituir recursos conforme necessário. Linguagens
        orientadas a objetos tornam isso simples de implementar e, portanto, um mecanismo familiar.
        Mas a herança tem suas desvantagens. Obviamente, é uma carta que só pode ser jogada uma
        vez. Se eu tiver mais de um motivo para variar alguma coisa, só posso usar a herança para um único
        eixo de variação. Portanto, se eu quiser variar o comportamento das pessoas de acordo com sua faixa
        etária e seu nível de renda, posso ter subclasses para jovens e idosos, ou para ricos e pobres – não
        posso ter ambas.
                Outro problema é que a herança introduz um relacionamento muito próximo entre as classes.
        Qualquer mudança que eu queira fazer no pai pode facilmente quebrar os filhos, por isso preciso ter
        cuidado e entender como os filhos derivam da superclasse. Este problema é agravado quando a
        lógica das duas classes reside em módulos diferentes e é cuidada por equipes diferentes.
                A delegação lida com esses dois problemas. Posso delegar para muitas classes diferentes por motivos
        diferentes. A delegação é um relacionamento regular entre objetos – portanto, posso ter uma interface
        clara para trabalhar, que é muito menos acoplada do que a subclasse. Portanto, é comum encontrar
        problemas com subclasses e aplicar Substituir Subclasse por Delegado.
        Existe um princípio popular: “Favorecer a composição de objetos em vez da herança de classes” (onde
        composição é efetivamente o mesmo que delegação). Muitas pessoas entendem que isso
        significa “herança considerada prejudicial” e afirmam que nunca devemos usar herança. eu uso herança com frequência, em parte porque sempre sei que posso usar Substituir Subclasse por
                Delegado caso precise alterá-la mais tarde. A herança é um mecanismo valioso que faz o trabalho na
        maioria das vezes sem problemas. Então, eu pego primeiro e passo para a delegação quando
        começa a atrapalhar. Na verdade, esse uso é consistente com o princípio - que vem do livro
        Gang of Four [gof] que explica como herança e composição funcionam juntas. O princípio foi uma reação
        ao uso excessivo de herança.
                Aqueles que estão familiarizados com o livro Gang of Four podem achar útil pensar nesta refatoração
        como a substituição de subclasses pelos padrões State ou Strategy. Ambos os padrões são
        estruturalmente iguais, dependendo da delegação do host a uma hierarquia separada. Nem
        todos os casos de Substituir Subclasse por Delegado envolvem uma hierarquia de herança para
        o delegado (como ilustra o primeiro exemplo abaixo), mas configurar uma hierarquia para estados
        ou estratégias costuma ser útil.
    #endregion

    Passos:
    1 - Se houver muitos chamadores para os construtores, aplique Substituir Construtor pela Função
de Fábrica (334).
    2 -     Crie uma classe vazia para o delegado. Seu construtor deve receber quaisquer dados
específicos da subclasse, bem como, geralmente, uma referência anterior à superclasse
    3 - Adicione um campo à superclasse para armazenar o delegado.
    4 - Modifique a criação da subclasse para que ela inicialize o campo delegado com um instância do delegado.Isso pode ser feito na função de fábrica ou no construtor, se o construtor puder
        dizer com segurança se deve criar o delegado correto
    5 -  Escolha um método de subclasse para passar para a classe delegada.
    6 - Use Move Function (198) para movê-lo para a classe delegada. Não remova o código de
            delegação da fonte. Se o método precisar de elementos que devem ser movidos para o delegado, mova-os. Se
        precisar de elementos que devem permanecer na superclasse, adicione um campo ao
        delegado que se refira à superclasse.
    7 - Se o método de origem tiver chamadores fora da classe, mova o código de delegação da origem da
        subclasse para a superclasse, protegendo-o com uma verificação da presença do delegado. Caso
        contrário, aplique Remover Código Morto (237),Se houver mais de uma subclasse e você começar a duplicar o código dentro delas, use Extract
        Superclass (375). Nesse caso, quaisquer métodos de delegação na superclasse de origem não precisam
        mais de proteção se o comportamento padrão for movido para a superclasse delegada
    8 - Teste
    9 - Repita até que todos os métodos da subclasse sejam movidos.
   10 - Encontre todos os chamadores do construtor da subclasse e altere-os para usar o
construtor da superclasse
    11 - Teste
    12 - Use Remove Dead Code (237) na subclasse.

*/

class BookingRefactored
{
    private PremiumBookingDelegate $premium_delegate;
    public function __construct(
        protected object $show,
        protected string $date,
        protected object|null $extras = null

    ) {
    }
    public function getBasePrice()
    {
        return isset($this->premium_delegate) ? $this->premium_delegate->getBasePrice() : $this->privateBasePrice();
    }
    public function privateBasePrice()
    {
        $result = $this->show->price;
        if ($this->isPeakDay()) $result += round($result * 0.15);
        return $result;
    }
    public function hasDinner()
    {
        return !$this->premium_delegate ? null : $this->premium_delegate->hasDinner();
    }
    protected function isPeakDay()
    {
        return $this->date == date('Y-m-d');
    }
    public static function createPremiumBook(object $show, string $date, object $extras)
    {
        $book = new BookingRefactored($show, $date, $extras);
        $book->bePremium($extras);
        return $book;
    }
    public function bePremium($extras)
    {
        $this->premium_delegate = new PremiumBookingDelegate($this, $extras);
    }
}
