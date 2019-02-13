<?php

/**
 *Program to create Visitor Design Pattern
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

require ('VisitorDesignPattern.php');
//try catch and finally
try {
    echo ("\n----------VISITOR DESIGN PATTERN------------\n");
    echo ("---------BEGIN TESTING VISITOR PATTERN----------\n");
    echo ("\n");

    //creating new ShoppingCartClient object
    $testor = new ShoppingCartClient;

    //calling testing function on testor object
    $testor->testing();

} catch (Exception $e) { //if exception occurs catch will hold the exception

    echo "\n", $e->getMessage();

} finally {

    echo ("\n");

    echo ("------------END TESTING VISITOR PATTERN----------------\n");

    echo ("\n");
}
echo "\n-------Reflection class Testing------\n";
//creating new ReflectionClass and passing class name as string param to its constructor
$reflector = new ReflectionClass('ShoppingCartVisitorImpl');

//printing the array
print_r($reflector->getMethods());
