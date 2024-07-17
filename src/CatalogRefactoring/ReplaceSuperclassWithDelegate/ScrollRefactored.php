<?php

namespace App\CatalogRefactoring\ReplaceSuperclassWithDelegate;

use DateTime;

/*
    Replace Superclass With Delegate
    #region Motivação
            Em programas orientados a objetos, a herança é uma forma poderosa e facilmente disponível de
    reutilizar funcionalidades existentes. Eu herdo de alguma classe existente, substituo e
    adiciono recursos adicionais. Mas a subclasse pode ser feita de uma forma que leva à confusão e complicações.
            Um dos exemplos clássicos de herança incorreta desde os primeiros dias dos objetos foi
    fazer com que uma pilha fosse uma subclasse de lista. A ideia que levou a isso foi reutilizar o
    armazenamento de dados da lista e as operações para manipulá-la. Embora seja bom reutilizar,
    essa herança tinha um problema: todas as operações da lista estavam presentes na
    interface da pilha, embora a maioria delas não fosse aplicável a uma pilha. Uma abordagem
    melhor é transformar a lista em um campo da pilha e delegar a ela as operações necessárias.
            Este é um exemplo de um motivo para usar Substituir Superclasse por Delegado - se as funções
    da superclasse não faz sentido na subclasse, isso é um sinal de que eu não deveria usar
    herança para usar a funcionalidade da superclasse.
            Além de usar todas as funções da superclasse, também deveria ser verdade que cada instância
    da subclasse é uma instância da superclasse e um objeto válido em todos os casos em que
    usamos a superclasse. Se eu tiver uma classe de modelo de carro, com coisas como nome e
    tamanho do motor, posso pensar que poderia reutilizar esses recursos para representar um
    carro físico, adicionando funções para número VIN e data de fabricação. Este é um erro de modelagem
    comum e muitas vezes sutil, que chamei de homônimo typeinstance [mftih]
            Ambos são exemplos de problemas que levam a confusão e erros – que podem ser facilmente
    evitados substituindo a herança pela delegação a um objeto separado. O uso da delegação
    deixa claro que é algo separado – algo em que apenas algumas das funções são transferidas.
    Mesmo nos casos em que a subclasse é uma modelagem razoável, eu uso Substituir Superclasse por
            Delegado porque o relacionamento entre uma subclasse e uma superclasse é altamente acoplado,
    com a subclasse facilmente quebrada por alterações na superclasse. A desvantagem é que preciso
    escrever uma função de encaminhamento para qualquer função que seja a mesma no host e
    no delegado — mas, felizmente, mesmo que tais funções de encaminhamento sejam chatas de
    escrever, elas são simples demais para errar.
            Como consequência de tudo isto, algumas pessoas aconselham evitar totalmente a herança –
    mas não concordo com isso. Desde que as condições semânticas apropriadas sejam
    aplicadas (cada método no supertipo se aplica ao subtipo, cada instância do subtipo é uma
    instância do supertipo), a herança é um mecanismo simples e eficaz. Posso aplicar facilmente
            Substituir Superclasse por Delegado caso a situação mude e a herança não seja mais a melhor
    opção. Portanto, meu conselho é (principalmente) usar a herança primeiro e aplicar Substituir
    Superclasse por Delegado quando (e se) isso se tornar um problema.
    #endregion

    Passos:
    - Crie um campo na subclasse que se refira ao objeto da superclasse. Inicialize esta
referência delegada para uma nova instância.
    - Para cada elemento da superclasse, crie uma função de encaminhamento na subclasse que
encaminhe para a referência delegada. Teste depois de encaminhar cada grupo consistente.Na maioria das vezes, você pode testar após cada função encaminhada, mas, por exemplo, os
pares get/set só podem ser testados depois que ambos forem movidos.
    - Quando todos os elementos da superclasse tiverem sido substituídos por encaminhadores, remova o vínculo de herança.


    */

class ScrollRefactored
{

        private CatalogItemOld $catalog_item;
        public function __construct(
                protected int $id,
                string $title,
                array $tags,
                protected string $date_last_cleaned
        ) {
                $this->catalog_item = new CatalogItemOld($id, $title, $tags);
        }
        public function getId()
        {
                return  $this->id;
        }
        public function getTitle()
        {
                return  $this->catalog_item->getTitle();
        }
        public function hasTag($tag)
        {
                return $this->catalog_item->hasTag($tag);
        }
        public function needCleaning($date)
        {
                $threshold = $this->hasTag('revered') ? 700 : 1500;
                return $this->daysSinceLastCleaning($date) > $threshold;
        }
        public function daysSinceLastCleaning($targetDate)
        {
                $lastCleanedDateTime = new DateTime($this->date_last_cleaned);
                $targetDateTime = new DateTime($targetDate);
                $interval = $lastCleanedDateTime->diff($targetDateTime);
                return $interval->days;
        }
}
