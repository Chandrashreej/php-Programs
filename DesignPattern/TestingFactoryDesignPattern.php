
<?php
/**
 *Program to create Factory Design Pattern to create a
 *Computer Factory that can Produce PC, Laptop and Server Class Computers
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

/**
 * error handler to handle errors
 */
set_error_handler(function ($errno, $errstr, $error_file, $error_line) {
    echo "______Error Occured_____handle it\n";
    echo "Error: [$errno] $errstr - $error_file:$error_line \n";
    die();
});
//files below are required to work on
require "FactoryDsgnPtrn.php";
require "/home/bridgeit/ChandraShree/Oops!/Utilioops.php";
echo ("\n----------FACTORY DESIGN PATTERN------------\n");
echo ("---------BEGIN TESTING FACTORY PATTERN----------\n");
echo ("\n");
try {
    echo "\nTo enter PC values \n";
    echo "\nEnter PC's RAM value : ";
    $pcRam = Utilioops::taking_Num_Input(); //taking num input and validating

    echo "Enter PC's HDD value : ";
    $pcHdd = Utilioops::taking_Num_Input(); //taking num input and validating

    echo "Enter PC's CPU value : ";
    $pcCpu = Utilioops::taking_Num_Input(); //taking num input and validating

    echo "\nTo enter Server Class Computer values \n";
    echo "Enter Server Class Computer's RAM value : ";
    $serverRam = Utilioops::taking_Num_Input(); //taking num input and validating

    echo "Enter Server Class Computer's HDD value : ";
    $serverHdd = Utilioops::taking_Num_Input(); //taking num input and validating

    echo "Enter Server Class Computer's CPU value : ";
    $serverCpu = Utilioops::taking_Num_Input(); //taking num input and validating

    echo "\nTo enter Laptop values \n";
    echo "Enter Laptop's RAM value : ";
    $laptopRam = Utilioops::taking_Num_Input(); //taking num input and validating

    echo "Enter Laptop's HDD value : ";
    $laptopHdd = Utilioops::taking_Num_Input(); //taking num input and validating

    echo "Enter Laptop's CPU value : ";
    $laptopCpu = Utilioops::taking_Num_Input(); //taking num input and validating

//calling static function getComputer from ComputerFactory to create an computer of that type
    $pc = ComputerFactory::getComputer("pc", $pcRam, $pcHdd, $pcCpu);

//calling static function getComputer from ComputerFactory to create an computer of that type
    $server = ComputerFactory::getComputer("server", $serverRam, $serverHdd, $serverCpu);

//calling static function getComputer from ComputerFactory to create an computer of that type
    $laptop = ComputerFactory::getComputer("laptop", $laptopRam, $laptopHdd, $laptopCpu);

//printing the data to monitor
    //calling toString method of computer interface to get values of particular type
    echo ("\nFactory PC Config:: " . $pc->toString() . "\n");

//calling toString method of computer interface to get values of particular type
    echo ("\nFactory Server Config:: " . $server->toString() . "\n");

//calling toString method of computer interface to get values of particular type
    echo ("\nFactory laptop Config:: " . $laptop->toString() . "\n");
} catch (Exception $e) {
    echo "\n", $e->getMessage();
} finally {
    echo ("------------END TESTING FACTORY PATTERN----------------\n");
    echo ("\n");
}
?>