<?php
/**
 * program to do inventory management details for Rice,
 * Pulses and Wheats with properties name, weight, price per kg.
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

// requires below .php file to work on
require 'Utilioops.php';
require 'Stock.php';

class StockPortfolio
{

    public $stocksArray = array();

    public function getTotalStocks()
    {
        $totalStocks = 0;
        for ($i = 0; $i < count($this->stocksArray); $i++) {
            $totalStocks += $this->stocksArray[$i]->getNumOfShares();
        }
        return $totalStocks;
    }
    public function getTotalStocksValue()
    {
        $totalStocksValue = 0;
        for ($i = 0; $i < count($this->stocksArray); $i++) {
            $totalStocksValue += $this->stocksArray[$i]->getTotalStockValue();
        }
        return $totalStocksValue;
    }
    public function getStocks()
    {
        return $this->stocksArray;
    }
    public function setStocks($stockArr)
    {
        $this->stocksArray = $stockArr;
    }

}
$stockArray = array();

echo "Enter the number of stocks :\n";
$numOfStocks =Utilioops::taking_Num_Input();

$count = 1;
$i = 0;
while($count <= $numOfStocks)
{
    echo "Enter the stock name : \n";
    $name = Utilioops::taking_string_input();
    echo "Enter the number of shares :\n";
    $numOfShares = Utilioops::taking_Num_Input();
    echo "Enter the share price : \n";
    $price = Utilioops::taking_Num_Input();

    $stock = new Stock();
    $stock->setName($name);
    $stock->setNumOfShares($numOfShares);
    $stock->setPrice($price);
    $stockArray[$i]= $stock;
    $count++;
    $i++;
}

$portfolio = new StockPortfolio();
$portfolio->setStocks($stockArray);
$array = $portfolio->getStocks();


echo "\n";
echo "Sl No \t Name  \t Total_Stocks \t Share_Price \t Stock_Value \n";
echo "================================================================== \n";
$count =1;
for($i=0;$i< count($array);$i++)
{
    
    echo " ".$count++ ."\t" .$array[$i]->getName()."\t\t". $array[$i]->getNumOfShares()."\t   ".$array[$i]->getPrice()."\t\t\t". $array[$i]->getTotalStockValue()."\n";

}
echo "\n Total Stock Value = ".$portfolio->getTotalStocksValue()."\n\n";