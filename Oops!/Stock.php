<?php
/**
* program to read in Stock Names, Number of Share, Share Price.
* Print a Stock Report with total value of each Stock and the total value of Stock.
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

//  creating Stock class
class Stock
{
    public $name;//creating global variable
    public $numOfShares;//creating global variable
    public $price;//creating global variable

    /**
     * creating the funct to getName
     * @param nothing
     * @return name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * creating the funct to setName
     * @param stringname
     * @return nothing
     */
    public function setName($str_Name)
    {
        $this->name = $str_Name;
    }

    /**
     * creating the funct to getNumOfShares
     * @param nothing
     * @return numOfShares
     */    
    public function getNumOfShares()
    {
        return $this->numOfShares;
    }

    /**
     * creating the funct to setNumOfShares
     * @param price_Value
     * @return nothing
     */
    public function setNumOfShares($price_Value)
    {
        $this->numOfShares = $price_Value;
    }

    /**
     * creating the funct to getPrice
     * @param nothing
     * @return Price
     */     
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * creating the funct to setPrice
     * @param price_Value
     * @return nothing
     */
    public function setPrice($price_Value)
    {
        $this->price = $price_Value;
    }

    /**
     * creating the funct to getTotalStockValue that calcutate
     * @param nothing
     * @return calculated price
     */   
    public function getTotalStockValue()
    {
        return ($this->getNumOfShares() * $this->getPrice());
    }
}
