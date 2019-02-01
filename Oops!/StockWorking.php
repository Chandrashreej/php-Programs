<?php
require_once 'Utilioops.php';
require 'Stock.php';
require 'StockPortfolio.php';

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
print_r($array);
// echo "\n";
// echo "Sl No \t Name \t\t Total_Stocks \t Share_Price \t Stock_Value \n";
// echo "==================================================================== \n";
// $count =1;
// for($i=0;$i< count($array);$i++)
// {
    
//     echo $count++ ."\t" .$array[$i]->getName()."\t\t\t". $array[$i]->getNumOfShares()."  \t".$array[$i]->getPrice()."  \t\t". $array[$i]->getTotalStockValue()."\n";

// }
// echo "\n Total Stock Value = ".$portfolio->getTotalStocksValue();