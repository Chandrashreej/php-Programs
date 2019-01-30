<?php
/**
 * program to do inventory management details for Rice,
 * Pulses and Wheats with properties name, weight, price per kg. 
 *
 * @author chandrashree j
 * @since 09-01-2019
 */
$strJsonFileContents = file_get_contents("Inventory.json");
$array = json_decode($strJsonFileContents,true);
print_r($array);
?>