<?php
/**
 * Program is to read an integer as an Input, convert to Binary using
 * toBinary function and perform the following functions.
 *i. Swap nibbles and find the new number.
 *ii. Find the resultant number which is the number that is a power of 2.
 *
 * @author chandrashree j
 * @since 09-01-2019
 */



//requires following php files to work
require 'Util.php';

// printing the name
echo "Binary to Decimal and vise verse\n";

// validating the input and copying that  to $num
echo "enter the number to covert binary to decimal and vise versa : ";
$num = Util::taking_num_input();


//method calling from util class
$num = Util::binary_to_decimal($num);
