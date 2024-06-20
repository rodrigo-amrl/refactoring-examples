<?php

namespace App\CatalogRefactoring\ParameterizeFunction;

/*
Parameterize Function
 Se eu vir duas funções que executam lógicas muito semelhantes com valores literais diferentes,
posso remover a duplicação usando uma única função com parâmetros para os valores
diferentes. Isso aumenta a utilidade da função, já que posso aplicá-la em outro lugar com
valores diferentes
Passos:
1 - Selecione um dos métodos semelhantes
2 - Use Declaração de Função de Mudança (124) para adicionar quaisquer literais que precisem se transformar em
parâmetros.
3 - Para cada chamador da função, adicione o valor literal.
4 - Teste
5 - Altere o corpo da função para usar os novos parâmetros. Teste após cada alteração.
6 - Para cada função semelhante, substitua a chamada por uma chamada para a função parametrizada.
Teste depois de cada um.
Se a função parametrizada original não funcionar para uma função semelhante, ajuste-a para a nova função
antes de passar para a próxima

 */

class ChargeRefactored
{
    function baseCharge($usage)
    {
        if ($usage < 0) {
            return $this->usd(0);
        }
        $amount =
            $this->withBand($usage, 0, 100) * 0.03 +
            $this->withBand($usage, 100, 200) * 0.05 +
            $this->withBand($usage, 200, 99999999) * 0.07;
        return $this->usd($amount);
    }
    function withBand($usage, $bottom, $top)
    {
        return $usage > $bottom ? min($usage, $top) - $bottom : 0;
    }
    function usd($value)
    {
        return number_format($value, 2, '.');
    }
}
