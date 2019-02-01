<?php
/**
 * program to get all the permutations of string
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

    //requires utility.php file to work
    include 'Utility.php';

    echo "To return all permutation of a String\n";
    echo "enter the string\n";

    // calling func taking string input from user
    $str = Utility::takingstringinput();

    $n = strlen($str);
    $i=0;

    // calling func string permutaion
    Utility::string_permutation($str,$i,$n-1);
?>