<?php

namespace App\CatalogRefactoring\InlineVariable;

class OrderOld
{

    public function __construct(protected array $order)
    {
    }
    public function getQuantity()
    {
        return $this->order['quantity'];
    }
    public function getItemPrice()
    {
        return $this->order['item_price'];
    }
    public function getPrice()
    {
        $price = $this->getBasePrice() - $this->getDiscount();
        return $price;
    }
    private function getBasePrice()
    {
        $base_price = $this->getQuantity() * $this->getItemPrice();
        return $base_price;
    }
    private function getDiscount()
    {
        $discount = 0;
        if ($this->hasDiscount())
            $discount = $this->getItemPrice() * 0.05;

        return $discount;
    }
    private function hasDiscount()
    {
        $base_price = $this->getBasePrice();
        return $base_price > 1000;
    }
}
