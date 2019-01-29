<?php
/**
 * Program to print prime and anagaram in 2D array
 * 
 * @author chandrashree j
 * @since 09-01-2019
 */

  include 'Utilds.php';

  echo "The prime numbers between 0 and 1000 are " ;
      
  // calling get_prime function from Utilds class

  $arr = Utilds::get_prime(1000);
  echo "\n";
  echo "\n";

  // calling prime_Anagram function from Utilds class

  Utilds::prime_Anagram($arr);
?>                                                                 