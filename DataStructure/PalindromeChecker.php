<?php
/**
*Program to check the string is palindrom using dequeue
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

 //  requires Utilds.php and Dequeue.php
require 'Dequeue.php'; 
require 'Utilds.php'; 

function palindrome_Checker()
{
    // creating dequeue object
    $deque = new Dequeue();
    echo "enter the string to do palindrome check\n";
    // taking user input
    $str = Utilds::taking_string_input();
    $str1 = "";
    //looping till the length of the string and adding to rear 
    for($x=0;$x<strlen($str);$x++)
    {
        $deque->addRear($str[$x]);
    }
    
    //looping till the length of the string and removing from rear 

    for($x=0;$x<strlen($str);$x++)
    {
        $str1 = $str1.($deque->removeRear());
    }

    // checking the case and comparing to both the string
    if(strcasecmp($str,$str1)==0)
    {
        echo "palindrome\n";
    }
    else
    {
        echo "not palindrome\n";
    }
}
// calling palindrome_Checker function
palindrome_Checker();
?>