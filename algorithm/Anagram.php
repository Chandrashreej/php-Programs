<?php
/*********************************Anagram***************************************/
/**Program take 2 Strings as Input and Check for Anagrams
 *
 * @author chandrashree j
 * @since 09-01-2019
 */


// requires following php file to work on
require 'Util.php';


// printing program name
echo "Anagram\n";


// taking user input
echo "Enter your first string: \n";
$str = Util::taking_string_input();


// taking user input
echo "Enter your second string: \n";
$anstr = Util::taking_string_input();


// method calling util class
Util::anagram_detection($str, $anstr);
