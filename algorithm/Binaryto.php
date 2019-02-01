<?php
/**
 * Program that outputs the binary (base 2) representation
 * of the decimal number typed as the input.
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

//requires following php files to work
require 'Util.php';


// method calling from util class
echo "Decimal to Binary\n";
$num = Util::taking_num_input();


//method calling from util class
$str = Util::decimal_to_binary($num);

// printing the data
echo "The binary value of decimal $num is $str ";
