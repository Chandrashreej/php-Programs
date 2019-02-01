<?php
/**
 * program to do inventory management details for Rice,
 * Pulses and Wheats with properties name, weight, price per kg.
 *
 * @author chandrashree j
 * @since 09-01-2019
 */
// requires below .php file to work on
require "Utilioops.php";

$myInvJSON = "Inventory.json"; //foe JSON file

$myInvObj = Utilioops::read_JSON_File($myInvJSON); //to get php object

$output = Utilioops::inventory_calculation($myInvObj); //calculating and printing the inventory details

$myJSON = Utilioops::conv_To_JSON($myInvObj); //conversting php object back to JSON string

echo "JSON string displaying \n" . $myJSON; //displaying JSON string
echo "\n";
echo "\n";
