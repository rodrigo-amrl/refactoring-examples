<?php

namespace App\CatalogRefactoring\IntroduceSpecialCase\Example2;

use App\CatalogRefactoring\ChangeValueToReference\Customer;

/**
 * Introduce Special Case
 * Um caso comum de código duplicado é quando muitos usuários de uma estrutura de dados verificam um valor específico e a maioria deles 
 * faz a mesma coisa. Se eu encontrar muitas partes do código base tendo a mesma reação a um valor específico, quero reunir essa reação em um único lugar.
 * 
 * Passos:
 * 1 - Adicione uma propriedade de verificação de caso especial ao assunto, retornando falso.
 * 2 - Crie um objeto de caso especial apenas com a propriedade de verificação de caso especial, retornando
 * 3 - Aplique a função Extract (106) ao código de comparação de casos especiais. Certifique-se de que todos os clientes usem a nova função em vez de compará-la diretamente
 * 4 - Introduza o novo assunto de caso especial no código, retornando-o de uma chamada de função ou aplicando uma função de transformação.
 * 5 - Altere o corpo da função de comparação de casos especiais para que ela use a propriedade de verificação de casos especiais.
 * 6 - Teste
 * 7 - Use Combine Functions into Class (144) ou Combine Functions into Transform (149) para mover todo o comportamento comum de casos especiais para o novo elemento.
 * 8 - Como a classe de caso especial geralmente retorna valores fixos para solicitações simples, elas podem ser tratadas tornando o caso especial um registro literal
 * 9 - Use a Função Inline (115) na função de comparação de casos especiais para os locais onde ela ainda é necessária
 */
class SiteOld
{
    private CustomerOld $customer;
    const BASIC_BILLING_PLAN = "start";

    public function __construct()
    {
    }
    public function getCustomer()
    {
        return $this->customer ?? null;
    }
    public function getCustomerName()
    {
        $customer = $this->getCustomer();
        $customer_name = '';

        if (empty($customer))
            $customer_name = "occupant";
        else
            $customer_name = $customer->getName();

        return $customer_name;
    }
    public function getCustomerBillingPlan()
    {
        return empty($this->getCustomer()) ? self::BASIC_BILLING_PLAN :  $this->getCustomer()->getBillingPlan();
    }
    public function getWeeksDelinquent()
    {
        return empty($this->getCustomer()) ? 0 :  $this->getCustomer()->getPaymentHistory()->weeks_delinquent_in_last_year;
    }
}
