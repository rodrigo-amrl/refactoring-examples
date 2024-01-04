<?php

namespace App\CatalogRefactoring\ReplacePrimitiveWithObject\Old;

/**
 * Replace Primitive to object
 * Podemos iniciar a representação de um dado com o tipo int,bool,string, mas
 * no evoluir do sistema esse dado pode ter validações, mascaras, manipulações que 
 * seja necessário transformar em um objeto.
 * Passos
 * - Aplique Encapsulate Variable se ainda não tiver
 * - Cria uma classe de valor simples para o valor dos dados. Deve pegar o valor existente em seu
 * construtor e fornecer um getter para esse valor
 * - Execute verificações estáticas
 * - Altere o seeter para criar uma nova instancia da classe de valor e armazene-a no campo, alterando tipo do campo.
 * - altere o getter para retornar o resultado da invocação do getter da nova classe.
 * - Teste
 * - Considere usar Rename Funtction nos acessadores originais para refletir melhor o que eles fazem.
 * - Considere esclarecer a função do novo objeto como um valor ou objecto de rerencia aplicando o Change Rerecence to Value
 */
class OrderControl
{

    private $orders = [];
    public function higthPriorityCount()
    {
        return array_filter($this->orders, fn ($o) => in_array($o['priority'], ['high', 'rush']));
    }
}
