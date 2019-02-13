<?php
/**
 *Program to create Prototype Design Pattern
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
require ('PrototypeDesignPattern.php');

//try catch
try {
    echo ("\n----------PROTOTYPE DESIGN PATTERN------------\n");
    echo ("---------BEGIN TESTING PROTOTYPE PATTERN----------\n");
    echo ("\n");

    //creating MyCloneable object for testing clone
    $obj = new MyCloneable();

    //creating SubObject class's object in instance variable of obj
    $obj->firstObject = new SubObject();
    $obj->secondObject = new SubObject();

    //cloning the obj to new obj
    $secObj = clone $obj;

    //pringing the original object
    print("Original Object:\n");
    print_r($obj);

    //printing the clonead object
    print("Cloned Object:\n");
    print_r($secObj);

} catch (Exception $e) {
    echo "\n", $e->getMessage();
} finally {
    echo ("------------END TESTING PROTOTYPE PATTERN----------------\n");
    echo ("\n");
}
