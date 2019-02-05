<?php
/**
 * program to read in Stock Names, Number of Share, Share Price.
 * Print a Stock Report with total value of each Stock and the total value of Stock.
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

// requires below .php file to work on
require 'Utilioops.php';
require 'Stock.php';

// creating StockPortfolio class
class StockPortfolio
{
    // creating array to store all Stock objects
    public $stocksArray = array();

    /**
     * function to calculate total shares of stocks
     * @return totalStocks is returned
     */
    public function getTotalStocks()
    {
        $totalStocks = 0; // variable to hold the data

        //loops untill the size of stocksarray and the value is returned
        for ($i = 0; $i < count($this->stocksArray); $i++) {

            $totalStocks += $this->stocksArray[$i]->getNumOfShares(); //value is getting from stock's getNumOfShares function

        }

        return $totalStocks; //total stocks is returned
    }

    /**
     * function to calculate total stocks value
     * @return totalStocksValue is returned
     */
    public function getTotalStocksValue()
    {
        $totalStocksValue = 0; // variable to hold the data

        //loops untill the size of stocksarray and the value is returned
        for ($i = 0; $i < count($this->stocksArray); $i++) {

            $totalStocksValue += $this->stocksArray[$i]->getTotalStockValue(); //value is getting from stock's getTotalStockValue function

        }

        return $totalStocksValue; //total stocks value is returned
    }

    /**
     * function to get all stocks as array
     * @return Stocksarray is returned
     */
    public function getStocks()
    {
        return $this->stocksArray;
    }

    /**
     * function to set stocks as array
     * @param accepts Stockarray
     * @return nothing
     */
    public function setStocks($stockArr)
    {
        $this->stocksArray = $stockArr;
    }

}
//enabling try catch to handle exception
try {
    $stockArray = array(); //creating stock array to store vales of stocks

    echo "Enter the number of stocks :\n";
    $numOfStocks = Utilioops::taking_Num_Input(); //taking number input from user

    $count = 1; //intialising count to 1

    $i = 0; // intialising i to 1

    //loops until num of stocks become equal to count
    while ($count <= $numOfStocks) {

        echo "Enter the stock name : \n";
        $name = Utilioops::taking_string_input(); //taking string input from user

        echo "Enter the number of shares :\n";
        $numOfShares = Utilioops::taking_Num_Input(); //taking number input from user

        echo "Enter the share price : \n";
        $price = Utilioops::taking_Num_Input(); //taking number input from user

        $stock = new Stock(); //creating new stock object

        $stock->setName($name); //setting the name of stock

        $stock->setNumOfShares($numOfShares); //setting the num of shares of stock

        $stock->setPrice($price); //setting the price of stock

        $stockArray[$i] = $stock; // copying stock to array

        $count++; // incrementing count

        $i++; // incrementing i
    }

    $portfolio = new StockPortfolio(); //creating stockportfolio object

    $portfolio->setStocks($stockArray); // passing array to portfolio

    $array = $portfolio->getStocks(); //getting array from portfolio

    echo "\n";
    //printing to monitor
    echo "Sl No \t Name  \t Total_Stocks \t Share_Price \t Stock_Value \n";

    echo "================================================================== \n";

    $count = 1; //intializing count with 1

    //looping till the size of array
    for ($i = 0; $i < count($array); $i++) {

        echo " " . $count++ . "\t" . $array[$i]->getName() . "\t\t" . $array[$i]->getNumOfShares() . "\t   " . $array[$i]->getPrice() . "\t\t\t" . $array[$i]->getTotalStockValue() . "\n";

    }

    // printing the value to monitor
    echo "\n Total Stock Value = " . $portfolio->getTotalStocksValue() . "\n\n";
} catch (Exception $e) {

    // to print the messeage
    echo "\n", $e->getMessage();
    
}
