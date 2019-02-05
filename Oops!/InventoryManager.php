<?php
/**
 * program to Create InventoryManager to manage the Inventory.
 * The Inventory Manager will use InventoryFactory to create Inventory Object from JSON.
 * The InventoryManager will call each Inventory Object in its list to
 * calculate the Inventory Price and then call the Inventory Object to return the JSON String.
 * The main program will be with InventoryManager
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

// requires below .php file to work on
require 'InventoryFactory.php';

// creating InventoryManager class
class InventoryManager
{

    /**
     *Creating function process
     * @param accept nothing
     * @return returns nothing
     */
    public function process()
    {
        //enabling try catch
        try {

            $file = 'InventoryManager.json'; //getting .json file

            //creating new InventoryFactory object with file as data
            $invFac = new InventoryFactory($file);

            //calling getInvObjectValues on the invFac object
            $myInvObj = $invFac->getInvObjectValues();

            $output = ""; //creating temp string

            $phoneOutput = ""; //creating temp string

            $PCOutput = ""; //creating temp string

            $CarsOutput = ""; //creating temp string

            echo "\n";
            echo "Phone Inventory details\n";
            // looping to get all the data of that particular key
            foreach ($myInvObj['Phone'] as $Phone) {

                // getting all output to print
                $phoneOutput .= "The total rate of " . $Phone['name'] . ", is " . ($Phone['shares'] * $Phone['rate']) . " Rs \n";
            }
            echo $phoneOutput; //printing data to monitor
            echo "\n";
            echo "\n";

            echo "PC Inventory details\n";
            // looping to get all the data of that particular key
            foreach ($myInvObj['PC'] as $PC) {

                // getting all output to print
                $PCOutput .= "The total rate of " . $PC['name'] . ", is " . ($PC['shares'] * $PC['rate']) . " Rs \n";
            }
            echo $PCOutput; //printing data to monitor
            echo "\n";
            echo "\n";

            echo "Cars Inventory details\n";
            // looping to get all the data of that particular key
            foreach ($myInvObj['Cars'] as $Cars) {

                // getting all output to print
                $CarsOutput .= "The total rate of " . $Cars['name'] . ", is " . ($Cars['shares'] * $Cars['rate']) . " Rs \n";
            }
            echo $CarsOutput; //printing data to monitor
            echo "\n";
            echo "\n";

            //calling convToJSON function on invFac object to get json object
            $myJSON = $invFac->convToJSON();

            echo $myJSON . "\n"; //printing the json

        } catch (Exception $e) {
            // to print the messeage
            echo "\n", $e->getMessage();
        }
    }
}

//creating new InventoryManager object
$invMan = new InventoryManager();

//calling process on the invMan object
$invMan->process();
