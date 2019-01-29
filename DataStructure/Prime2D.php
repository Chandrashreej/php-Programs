<?php
/**
 * Program to print prime numbers in 2D array
 * 
 * @author chandrashree j
 * @since 09-01-2019
 */

 //require functions in below files to work 
  include 'Utilds.php';

  function primeD()
  {
    echo "The prime numbers between 0 and 1000 are " ;

    // calling get_prime function from Utilds class

    $arr = Utilds::get_prime(1000);
    echo "\n";

    // calling TwoDArray function from Utilds class

    Utilds::TwoDArray($arr);

    echo "\n";
  }
  // calling primeD function 
  primeD();

?>                                                                