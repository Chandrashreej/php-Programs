<?php
/**
 *  Prime Numbers that are Anagram in the Range of 0 - 1000 in a Queue using the Linked List and
 *  Print the Anagrams from the Queue
 * 
 * @author chandrashree j
 * @since 09-01-2019
 */

 //require functions in below files to work 
  include 'Utilds.php';
  function stack_Anag()
  {
    echo " \n";
    echo "The prime numbers between 0 and 1000 are\n" ;
    // calling get_prime function of Utilds
    $arr = Utilds::get_prime(1000);

    // calling stack_Anagram function of Utilds
    Utilds::stack_Anagram($arr);
  }
  // calling stack_Anagram function
  stack_Anag();
  echo " \n";
  
?>                                                                 