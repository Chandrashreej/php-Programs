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

//creating a Hotel interface with getMenus function so that unrelated class can implement same methods
interface Hotel
{
    public function getMenus(); //abstract function of interface class
}
//creating class NonVegMenu so that it can be used by NonVegRestaurant class
class NonVegMenu
{

}
//creating class VegMenu so that it can be used by VegRestaurant class
class VegMenu
{

}
//creating class Both so that it can be used by VegNNonVegBothRestaurant class
class Both
{

}
//creating NonVegRestaurant class that implements HOtel interface and it should implement getmenus function
class NonVegRestaurant implements Hotel
{
    /**
     *Creating function getMenus to get the menu of that particular restaurant
     *@param nothing
     *@return nonVegMenu is returned
     */
    public function getMenus()
    {
        $nonVegMenu = new NonVegMenu(); //creating NonVegMenu object
        return $nonVegMenu; //returning nonVegMenu object
    }
}
//creating VegRestaurant class that implements HOtel interface and it should implement getmenus function
class VegRestaurant implements Hotel
{

    /**
     *Creating function getMenus to get the menu of that particular restaurant
     *@param nothing
     *@return vegMenu is returned
     */
    public function getMenus()
    {
        $vegMenu = new VegMenu(); //creating VegMenu object
        return $vegMenu; //returning VegMenu object
    }
}
//creating VegNNonVegBothRestaurant class that implements HOtel interface and it should implement getmenus function
class VegNNonVegBothRestaurant implements Hotel
{
    /**
     *Creating function getMenus to get the menu of that particular restaurant
     *@param nothing
     *@return both is returned (i.e, it has both veg and non veg menu)
     */
    public function getMenus()
    {
        $both = new Both(); //creating Both object
        return $both; //returning Both object
    }
}
//creating hotelkeeper class which is facade class
class HotelKeeper
{
    /**
     *Creating function getVegMenu to get the menu of that particular restaurant
     *@param nothing
     *@return void
     */
    public function getVegMenu()
    {
        $vegRestaurant = new VegRestaurant(); //creating new VegRestaurant object
        $vegMenu = $vegRestaurant->getMenus(); // calling getMenus function of VegRestaurant class on vegRestaurant object
        echo "Here Sir, veg menu of XYZ Veg Restaurant \n ";
    }
    /**
     *Creating function getNonVegMenu to get the menu of that particular restaurant
     *@param nothing
     *@return void
     */
    public function getNonVegMenu()
    {
        $nonVegRestaurant = new NonVegRestaurant(); //creating new NonVegRestaurant object
        $nonvegMenu = $nonVegRestaurant->getMenus(); // calling getMenus function of NonVegRestaurant class on NonVegRestaurant object
        echo "Here Sir, Non veg menu of XYZ Non Veg Restaurant\n ";
    }
    /**
     *Creating function getVegNonMenu to get the menu of that particular restaurant
     *@param nothing
     *@return void
     */
    public function getVegNonMenu()
    {
        $vegNonBothRestaurant = new VegNNonVegBothRestaurant(); //creating new VegNNonVegBothRestaurant object
        $bothMenu = $vegNonBothRestaurant->getMenus(); // calling getMenus function of VegNNonVegBothRestaurant class on vegNonBothRestaurant object
        echo "Here Sir, Both veg and non veg menu of XYZ Veg/Non Veg Restaurant\n ";
    }
}
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
