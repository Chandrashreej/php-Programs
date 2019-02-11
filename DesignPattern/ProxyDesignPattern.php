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

/**
 *Creating an CommandExecutor interface with abstract method
 */
interface CommandExecutor
{

    public function runCommand($cmd); //abstract method that has to be implemented by that implements this interface
}

/**
 *Creating an CommandExecutorImpl class implements CommandExecutor interface and has to implement abstract method
 */
class CommandExecutorImpl implements CommandExecutor
{
    /**
     *implementing function runCommand to print the data
     *@param cmd that is passed to access
     *@return nothing
     */
    public function runCommand($cmd)
    {

        echo ("'" . $cmd . "' command executed.\n"); //prints the data
    }

}
/**
 *Creating an CommandExecutorProxy class implements CommandExecutor interface and has to implement abstract method
 */
class CommandExecutorProxy implements CommandExecutor
{

    private $isAdmin; //private instance variable
    private $executor; //private instance variable
    /**
     *Creating an constructor of CommandExecutorProxy to pass parameter at the time of object creation
     *@param user is name passed by user
     *@param pwd is password passed by user
     */
    public function __construct($user, $pwd)
    {
        if (strcasecmp("Chandu", $user) == 0 && strcasecmp("bridgelabs@php", $pwd) == 0) {

            $this->isAdmin = true; // to assign the instance variable
        }
        $this->executor = new CommandExecutorImpl(); // creating new CommandExecutorImpl object and assigning same to the instance variable

    }
    /**
     *implementing function runCommand to validate
     *@param cmd that is passed to access
     *@return nothing
     */
    public function runCommand($cmd)
    {
        if ($this->isAdmin) { // to check the instance variable if true enters the if loop

            $this->executor->runCommand($cmd); //calling runCommand on executor object

        } else { //if llop is not matched comes to else

            $trimmed = trim($cmd); //trimming the space from string

            $num = strcmp(substr($trimmed, 0, 2), "rm"); //getting a part of a string and comparing case sensitively it with rm

            if ($num == 0) { //if the value num is equal to zero comes to this loop

                throw new Exception("rm command is not allowed for non-admin users.\n"); //throws new exception

            } else { //if not equal comes to this loop

                $this->executor->runCommand($cmd); //calling runCommand on executor object
            }
        }
    }

}
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
