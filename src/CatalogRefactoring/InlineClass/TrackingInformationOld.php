<?php

namespace App\CatalogRefactoring\InlineClass;

/**
 * Inline Class
 * passos
 * - Na class Destino, crie funções para todas as funções publiccas da classe de origem.
 * - Altere todas as referências aos métodos da classe origem para que eles usem os delegadores da classe destino.
 * - Mova todas as funções e dados da classe de origem para o destino, testando após cada movimentação, até que a 
 * classe de origem esteja vazia.
 * - Exclua a classe de origem e realizae um funeral curso e simples.
 * 
 */
class TrackingInformationOld
{

    public function __construct(
        private $shipping_company,
        private $tracking_number
    ) {
    }
    public function getShippingCompany()
    {
        return $this->shipping_company;
    }
    public function setShippingCompany($value)
    {
        $this->shipping_company = $value;
    }
    public function getTrackingNumber()
    {
        return $this->tracking_number;
    }
    public function setTrackingNumber($value)
    {
        $this->tracking_number = $value;
    }
    public function display()
    {
        return "{$this->shipping_company}: {$this->tracking_number}";
    }
}
