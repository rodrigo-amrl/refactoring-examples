<?php

namespace App\ProdutionPlan;


class Province
{
    private array $producers = [];
    public function __construct(
        protected readonly string $name,
        array $producers,
        protected readonly int $demand,
        protected readonly float $price,
        public  float $total_production  = 0,

    ) {
        array_map("self::AddProducer", $producers);
    }
    public function AddProducer($arg)
    {
        $this->producers[] = new Producer($this, ...$arg);
        $this->total_production += $arg['production'];
    }

    public function getName()
    {
        return $this->name;
    }
    public function getProducers()
    {
        return $this->producers;
    }
    public function getTotalProdution()
    {
        return $this->total_production;
    }
    public function setTotalProdution($arg)
    {
        $this->total_production = $arg;
    }
    public function getDemand()
    {
        return $this->demand;
    }
    public function setDemand($arg)
    {
        $this->demand = $arg;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($arg)
    {
        $this->price = $arg;
    }
    public function getShortFall()
    {
        return $this->demand - $this->total_production;
    }
    public function getProfit()
    {
        return $this->getDemandValue() - $this->getDemandCost();
    }
    public function getDemandCost(): float
    {
        $remainingDemand = $this->demand;
        $result  = 0;
        // usort((array) $this->producers, fn ($a, $b) => $a['cost'] - $b['cost']);

        foreach ($this->producers as $producer) {
            $constribuition = min([$remainingDemand, $producer->getProduction()]);
            $remainingDemand -= $constribuition;
            $result += $constribuition * $producer->getCost();
        }
        return $result;
    }
    private function getDemandValue()
    {
        return $this->getSatisfiedDemand() * $this->price;
    }
    private function getSatisfiedDemand()
    {
        return min([$this->demand, $this->total_production]);
    }
}
