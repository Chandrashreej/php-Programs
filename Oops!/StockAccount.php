<?php

//class to create object of stock
class StockData
{
    //var to store the data of stock
    public $name;
    
    //price of stack
    public $price;
    
    //quantity of share in the stock
    public $quantity;
    
    //constructor to initialize the variables in the class
    function __construct($name, $price, $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}

?>