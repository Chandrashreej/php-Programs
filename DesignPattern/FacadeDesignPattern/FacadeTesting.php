<?php
/**
 *Program to create Facade Design Pattern
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

/********************************************************************************************/
/**
 * error handler to handle errors
 */
set_error_handler(function ($errno, $errstr, $error_file, $error_line) {
    echo "______Error Occured_____handle it\n";
    echo "Error: [$errno] $errstr - $error_file:$error_line \n";
    die();
});
//requires below file to work on
require "/home/bridgeit/ChandraShree/Oops!/Utilioops.php";
require ('FacadeDesignPattern.php');


//creating clent class for testing Facade Design pattern
class Client
{
    /**
     *Creating function customerFacing to know how the facade design pattern works
     *@param nothing
     *@return void
     */
    public function customerFacing()
    {

        //try catch
        try {
            echo ("\n----------FACADE DESIGN PATTERN------------\n");
            echo ("---------BEGIN TESTING FACADE PATTERN----------\n");
            echo ("\n");
            //asking the user for input
            echo "\nPress 1 for Veg menu \nPress 2 for Non Veg menu \nPress 3 for Both veg and non veg menu \nPress 4 to exit \n";
            $choice = Utilioops::taking_Num_Input(); //validating the input using Utilioops function taking_Num_Input
            $hotelKeeper = new HotelKeeper(); //creating new HotelKeeper class

            //switch statement is used to perform different actions based on different conditions
            switch ($choice) {
                case 1:
                    //if customer chooses vegmenu
                    $vegMenu = $hotelKeeper->getVegMenu(); //calling getVegMenu function on hotelKeeper object to show the menu
                    echo "\n";
                    $this->customerFacing(); //calling customerFacing function to show the menu to user again
                    break;
                case 2:
                    //if customer chooses nonveg menu
                    $nonVegMenu = $hotelKeeper->getNonVegMenu(); //calling getNonVegMenu function on hotelKeeper object to show the menu
                    echo "\n";
                    echo "\n";
                    $this->customerFacing(); //calling customerFacing function to show the menu to user again
                    break;
                case 3:
                    //if customer chooses Veg and Nonveg Menu
                    $both = $hotelKeeper->getVegNonMenu(); //calling getVegNonMenu function on hotelKeeper object to show the menu
                    echo "\n";
                    echo "\n";
                    $this->customerFacing(); //calling customerFacing function to show the menu to user again
                    break;
                default:
                    //if customer chooses to exit
                    echo "Thank You for visiting Come again ...\n";
                    echo "\n";
                    break;
            }
        } catch (Exception $e) {//if exception occurs catch will hold the exception
            echo "\n", $e->getMessage();
        } finally {
            echo ("------------END TESTING FACADE PATTERN----------------\n");
            echo ("\n");
        }

    }
}
//creating new client object
$client = new Client();

//calling customerFacing function on client object
$client->customerFacing();
