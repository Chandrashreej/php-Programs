<?php
/*
 * Purpose  : Implementation of Aop ie cross cutting concerns. Using logger example
 * File Name: Aop.php
 * Author   : Chandrashree J
 * Version  : 1.0
 * Since    : 06/02/2019
 */

/**
 * class Logger is having one function which implements all the function of UserProfile by creating
 * one logger Object and passing this object to user profile constructor during creation of user Profile object
 */
class Logger
{
    /**
     * function to log the passed message
     * @param message to be logged
     * @return void
     */
    public function log($message)
    {
        echo ("Logging Message : $message\n");
    }
}

/**
 * UserProfile Class for implementing all the number of function and and also having a constructor of
 * Logger class which takes one argument
 */
class UserProfile
{
    //member variable
    private $logger;
    /**
     * constructor to initialize values
     * @param logger instance
     * @return void
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * this function create user and display the message as
     * logging message user created
     * @param empty
     * @return void
     */
    public function createUser()
    {
        // $logger = new Logger();
        // $logger->log("User Created:");
        $this->logger->log("User Created");
    }

    /**
     * this function update user and display the message as
     * logging message user update
     * @param empty
     * @return void
     */
    public function updateUser()
    {
        // $logger = new Logger();
        // $logger->log("User Created:");
        $this->logger->log("User Updated");
    }

    /**
     * this function delete user and display the message as
     * logging message user delete
     * @param empty
     * @return void
     */
    public function deleteUser()
    {
        // $logger = new Logger();
        // $logger->log("User Created:");
        $this->logger->log("User Deleted");
    }
}

//creating object of logger class
$logger = new Logger();

//creating object of UserProfile class
$profile = new UserProfile($logger);

//calling functions
$profile->createUser() . "\n";
$profile->updateUser() . "\n";
$profile->deleteUser() . "\n";
