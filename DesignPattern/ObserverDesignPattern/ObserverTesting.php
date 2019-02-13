<?php
/**
 *Program to create Observer Design Pattern
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
require ('ObserverDesignPatter.php');

//try catch finally block if exception happen
try {
    echo ("\n----------OBSERVER DESIGN PATTERN------------\n");
    echo ("---------BEGIN TESTING OBSERVER PATTERN----------\n");
    //creating new subject class object
    $subject = new Subject;

    //creating new ConcreteObserverA class object
    $firstObserver = new ConcreteObserverA;
    $subject->attach($firstObserver); //calling attach function on Subject object

    //creating new ConcreteObserverB class object
    $secondObserver = new ConcreteObserverB;
    $subject->attach($secondObserver); //calling attach function on Subject object

    $subject->someBusinessLogic(); //calling someBusinessLogic function on Subject object
    $subject->someBusinessLogic(); //calling someBusinessLogic function on Subject object

    $subject->detach($secondObserver); //calling detach function on Subject object

    $subject->someBusinessLogic(); //calling someBusinessLogic function on Subject object

} catch (Exception $e) {
    echo "\n", $e->getMessage();
} finally {
    echo ("------------END TESTING OBSERVER PATTERN----------------\n");
    echo ("\n");
}
