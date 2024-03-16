<?php


namespace App\CatalogRefactoring\SlideStatements;

/**
 * Slide Statements
 * O código fica mais fácil de entender quando coisas relacionadas aparecem juntas.
 * Utilizar o Slide Statements par manter o código unido.
 * Passos
 *  - Identifique a posição alvo para a qual mover o fragmento. Examine as declarações entre a origem e o destino para ver se há interferência no fragmento candidato. Abandonar 
 * a ação se houver alguma interferência.
 * - Um fragmento não pode deslizar para trás antes que qualquer elemento ao qual ele faz referência seja declarado.
 * - Um fragmento não pode deslizar para frente além de qualquer elemento que o faça referência
 * - Um fragmento não pode deslizar para sobre qualquer instrução que modifique um elemento ao qual faz referência
 * - Um fragmento que modifica um elemento não pode deslizar sore qualquer outro elemento que faça referência ao elemento modificado.
 * - Corte o fragmento da origem e cole na posição de destino
 * - teste
 * 
 * Teste
 */
class Refactored
{
    private $allocatedResources = [];
    private $availableResources = [];

    public function  loadChargeOrder()
    {
        $pricingPlan = $this->retrievePricingPlan();
        $baseCharge = $pricingPlan['base'];
        $charge = null;
        $chargePerUnit = $pricingPlan['unit'];
        $order = $this->retreiveOrder();
        $units = $order['units'];
        $discountableUnits = max($units - $pricingPlan['discountThreshold'], $order['units']);
        $discount = null;
        $discount = $discountableUnits * $pricingPlan['discountFactor'];
        if ($order['isRepeat']) $discount += 20;
        $charge = $baseCharge + $units * $chargePerUnit;
        $charge = $charge - $discount;

        return   $this->chargeOder($charge);
    }
    private function retrievePricingPlan()
    {
        //declarado apenas para não dar erro, não entra no exemplo
    }
    private function retreiveOrder()
    {
        //declarado apenas para não dar erro, não entra no exemplo

    }
    private function chargeOder()
    {
        //declarado apenas para não dar erro, não entra no exemplo

    }
    public function getResult()
    {
        $result = null;
        if (count($this->availableResources()) > 0) {
            $result = $this->createResource();
        } else {
            $result =  array_pop($this->availableResources);
        }
        $this->allocatedResources[] = $result;

        return $result;
    }
    private function availableResources()
    {
        //declarado apenas para não dar erro, não entra no exemplo
        return [];
    }
    private function createResource()
    {
        //declarado apenas para não dar erro, não entra no exemplo
    }
}
