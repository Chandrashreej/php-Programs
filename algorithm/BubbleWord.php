<?php
/**
 * program to use bubble sort and search the element given from file.
 * @author chandrashree j
 * @since 09-01-2019
 */

//requires following php files to work
include "Util.php";


//open the file and read the data from the file 
$myfile = fopen("tt.txt", "r") or die("unable to open");
$line = fread($myfile, filesize("tt.txt"));


// explode the string to get string array
$str = explode(" ", $line);


// get the size of array using sizeof and copy to $num
$num = sizeof($str);


// bubble_sort_for_num method calling from util class
Util::bubble_sort_for_num($str, $num);
