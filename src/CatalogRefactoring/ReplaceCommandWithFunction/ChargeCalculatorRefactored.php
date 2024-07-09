<?php

namespace App\CatalogRefactoring\ReplaceCommandWithFunction;

/* 
Replace Command With Function

#region Motivação
        Os objetos de comando fornecem um mecanismo poderoso para lidar com cálculos complexos.
        Eles podem ser facilmente divididos em métodos separados compartilhando estados comuns através
        dos campos; eles podem ser invocados através de métodos diferentes para efeitos diferentes; eles
        podem ter seus dados construídos em estágios. Mas esse poder tem um custo. Na maioria das
        vezes, eu só quero invocar uma função e fazer com que ela faça seu trabalho. Se for esse o caso,
        e a função não for muito complexa, então um objeto de comando é mais problemático do que vale e
        deve ser transformado em uma função regular
#endregion

Passos: 
1 -Aplique a Função Extrair (106) à criação do comando e à chamada ao método de execução do comando. 
   Isso cria a nova função que substituirá o comando no devido tempo
2 - Para cada método chamado pelo método de execução do comando, aplique a Função Inline (115).Se a função de suporte retornar um valor, use Extrair Variável (119) na chamada
primeiro e depois Função Inline (115).
3 - Use Declaração de Função de Mudança (124) para colocar todos os parâmetros do construtor no método de execução do comando.
4 - Para cada campo, altere as referências no método de execução do comando para usar o parâmetro. Teste após cada alteração
5 - Incorpore a chamada do construtor e a chamada do método de execução do comando no chamador (que é a função de substituição)
6 - Teste
7 - Aplique Remove Dead Code (237) à classe de comando
*/

class ChargeCalculatorRefactored
{
    public function getCharge(object $customer, float $usage, object $provider)
    {
        $base_charge = $customer->base_rate * $usage;
        return $base_charge + $provider->connection_charge;
    }
    
}
