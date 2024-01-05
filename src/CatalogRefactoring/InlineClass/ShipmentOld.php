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
class ShipmentOld
{

    private $trackingInformation;
    public function __construct()
    {
        $this->trackingInformation = new TrackingInformationOld('Express', "RR33288");
    }
    public function getTrackingInfo()
    {
        return $this->trackingInformation->display();
    }
    public function getTrackingInformation()
    {
        return $this->trackingInformation;
    }
    public function setTrackingInformation(TrackingInformationOld $trackingInformation)
    {
        $this->trackingInformation = $trackingInformation;
    }
}
