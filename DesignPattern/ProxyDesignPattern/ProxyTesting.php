<?php
/**
 *Program to create Facade Design Pattern
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

/********************************************************************************************/
/**
 * error handler to handle errors
 */
set_error_handler(function ($errno, $errstr, $error_file, $error_line) {
    echo "______Error Occured_____handle it\n";
    echo "Error: [$errno] $errstr - $error_file:$error_line \n";
    die();
});
//requires below file to work on
require "/home/bridgeit/ChandraShree/Oops!/Utilioops.php";
require 'ProxyDesignPattern.php';

//try catch finally block
try {
    echo ("\n----------PROXY DESIGN PATTERN------------\n");
    echo ("---------BEGIN TESTING PROXY PATTERN----------\n");
    echo ("\n");

    echo "Enter the user Name\n";
    $user = Utilioops::taking_string_input(); //taking user input and validating and assigning

    echo "Enter the password\n";
    $pwd = Utilioops::taking_string_input(); //taking user input and validating and assigning

    $executor = new CommandExecutorProxy($user, $pwd); //creating new CommandExecutorProxy object with parameters user and pwd

    $executor->runCommand("ls -ltr"); //calling runCommand on executor object and passing command
    $executor->runCommand(" rm -rf abc.pdf"); //calling runCommand on executor object and passing command

} catch (Exception $e) {

    echo "\n", $e->getMessage(); //printing the exception message

} finally {
    echo ("------------END TESTING PROXY PATTERN----------------\n");
    echo ("\n");
}
