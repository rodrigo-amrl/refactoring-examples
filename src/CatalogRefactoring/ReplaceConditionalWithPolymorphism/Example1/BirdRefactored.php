<?php

namespace App\CatalogRefactoring\ReplaceConditionalWithPolymorphism\Example1;

/**
 * Replace Conditional With Polymorphism
 * A lógica condicional complexa é uma das coisas mais difíceis de raciocinar na programação, por isso
 * sempre procuro maneiras de adicionar estrutura à lógica condicional. 
 * 
 * Passos: 
 * 1- Se não existirem classes para comportamento polimórfico, crie-as junto com uma fábrica função para retornar a instância correta
 * 2 - Use a função de fábrica ao chamar o código
 * 3 - Mova a função condicional para a superclasse. Se a lógica condicional não for uma função independente, use a Função Extrair (106) para torná-la assim
 * 4 - Repita para cada perna da condicional
 * 5- Deixe um caso padrão para o método da superclasse. Ou, se a superclasse deveria ser abstrata, declare esse método como abstrato ou gere um erro 
 * para mostrar que ele deveria ser o responsabilidade de uma subclasse.
 */
class BirdRefactored
{

    public function createBird($bird)
    {
        switch ($bird['type']) {
            case "European Swallow":
                return new EuropeanSwallow($bird);
            case "African Swallow":
                return new AfricanSwallow($bird);
            case "Norwegian Blue Parrot":
                return new NorwegianBlueParrot($bird);
            default:
                return new Bird($bird);
        }
    }
}
