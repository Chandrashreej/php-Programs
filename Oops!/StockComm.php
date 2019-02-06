<?php
/**
*StockAccount.java implements a data type that might be used by a 
*financial institution to keep track of customer information.
 *The StockAccount class implements following methods
 *
 * @author chandrashree j
 * @since 09-01-2019
 */
// requires below .php file to work on
set_error_handler(function ($errno, $errstr, $error_file, $error_line) {
    echo "Error Occured!!!\n";
    echo "Error: [$errno] $errstr - $error_file:$error_line \n";
    die();
});

//require the files from the below files
require "Utilioops.php";
require_once 'StockAccount.php';

function menu($account)
{
    $ch = 0;
    while ($ch != 5) {
        //menu shown to the user
        echo "Commercial Data Processing\n";

        echo "Enter 1 to print to know user details from the file\n";

        echo "Enter 2 to buy New Stock from the StockList\n";

        echo "Enter 3 to Sell Stocks\n";

        echo "Enter 4 to Print Stock Report\n";

        echo "Enter 5 to save the account and exit\n";

        $ch = Utilioops::taking_Num_Input();//taking user input
        //switch case to run according to condition
        switch ($ch) {
            case 1:
                $newAccount = $account;
                echo "Printing user details \n";
                //to print the new account
                Utilioops::printAccount($account);
                echo "\n";
                break;

            case 2:
                //calling function to buy a share and adding to account
                $account = Utilioops::buy($account);
                echo "\n\n";
                break;
            case 3:
                //calling function to sell share from account
                $account = Utilioops::sell($account);
                echo "\n\n";
                break;
            case 4:
                //printing the report
                echo "Printing the stock account details of customer\n\n";
                Utilioops::report($account);
                break;
            case 5:
                echo "Account Saved to file-------\n";
                break;
            default:
                echo "Enter a valid option\n";
                break;
        }
    }
}

$account = json_decode(file_get_contents("UserShare.json"));//getting user details
menu($account);
