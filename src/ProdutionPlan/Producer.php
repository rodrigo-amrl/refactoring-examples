<?php

namespace App\ProdutionPlan;

class Producer
{
    public function __construct(
        protected Province $province,
        protected float $cost,
        protected string $name,
        protected float $production
    ) {
    }
    public function getName()
    {
        return $this->name;
    }
    public function getCost()
    {
        return $this->cost;
    }
    public function setCost($arg)
    {
        $this->cost = $arg;
    }
    public function getProduction()
    {
        return $this->production;
    }
    public function setProduction($amountStr)
    {
        $amount = intval($amountStr);
        $new_production = is_numeric($amount) ? $amount : 0;
        $this->province->total_production += $new_production - $this->production;
        $this->production  = $new_production;
    }
}
