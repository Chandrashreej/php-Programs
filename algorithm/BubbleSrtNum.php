<?php
/**
 * program to use bubble sort and search the element given.
 * 
 * 
 * @author chandrashree j
 * @since 09-01-2019
 */

//requires following php files to work
require 'Util.php';


// printing the name
echo "Bubble sort for Number\n";
echo "Enter the length of array: \n";


// method calling from util class
$num = Util::taking_num_input();


$z = 0;                                 //defining variable for the index of array


while ($num == 0) {
    // validating the input untill the user gives correct input
    echo "Enter the length greater than 0: \n";
    $num = Util::taking_num_input();
}


$arr = array();                         //declaring array


while ($num != sizeof($arr)) {

    // accepting the input for the array untill size of array becomes full
    echo "Enter the values for array: \n";

    $number = Util::taking_num_input(); //taking num input for user after validating

    $arr[$z] = $number;                 //copying the num to array
    $z++;                               //incrementing the index of array
}

// method calling from util class
Util::bubble_sort_for_num($arr, $num);
