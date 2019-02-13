<?php
/**
 *Program to create Facade Design Pattern
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

/********************************************************************************************/

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
