<?php

namespace App\CatalogRefactoring\ExtractVariable;


class OrderOld
{

    public function __construct(protected array $data)
    {
    }

    public function getQuantity()
    {
        return $this->data['quantity'];
    }
    public function getItemPrice()
    {
        return $this->data['item_price'];
    }
    public function getPrice()
    {
        return $this->getQuantity() * $this->getItemPrice() -
            max(0, $this->getQuantity() - 500) * $this->getItemPrice() * 0.05 +
            min($this->getQuantity() * $this->getItemPrice() * 0.1, 100);
    }
}
