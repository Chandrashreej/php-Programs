<?php
class Stock
{
    public $name;
    public $numOfShares;
    public $price;

    public function getName()
    {
        return $this->name;
    }

    public function setName($str_Name)
    {
        $this->name = $str_Name;
    }
    public function getNumOfShares()
    {
        return $this->numOfShares;
    }

    public function setNumOfShares($price_Value)
    {
        $this->numOfShares = $price_Value;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price_Value)
    {
        $this->price = $price_Value;
    }

    public function getTotalStockValue()
    {
        return ($this->getNumOfShares() * $this->getPrice());
    }
}
