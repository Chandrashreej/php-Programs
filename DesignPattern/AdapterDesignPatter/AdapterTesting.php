<?php
/**
 *Program to create Adapter Design Pattern
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

/********************************************************************************************/
//requires below file to work on
require_once "/home/bridgeit/ChandraShree/Oops!/Utilioops.php";
require ('AdapterDesignPatter.php');
/**
 * error handler to handle errors
 */
set_error_handler(function ($errno, $errstr, $error_file, $error_line) {
    echo "______Error Occured_____handle it\n";
    echo "Error: [$errno] $errstr - $error_file:$error_line \n";
    die();
});
/********************************************************************************************/
/**
 *Creating an AdapterPatternTest class to test adpter design pattern
 */
class AdapterPatternTest
{
    /**
     *Creating function testClassAdapter
     *@param nothing
     *@return void
     */
    public function testClassAdapter()
    {
        try {

            echo ("\n----------ADAPTER DESIGN PATTERN------------\n");
            echo ("---------BEGIN TESTING ADAPTER PATTERN----------\n");
            echo ("\n");

            //creating new SocketClassAdapterImpl object
            $sockAdapter = new SocketClassAdapterImpl();
            $v3 = self::getVolt($sockAdapter, 3); //getting volt of required type
            $v12 = self::getVolt($sockAdapter, 12); //getting volt of required type
            $v120 = self::getVolt($sockAdapter, 120); //getting volt of required type

            //listing all the values that adapter can provide to monitor
            echo ("Adapter of voltage = " . $v3->getVolts() . " volt \n"); //internally calling getVolts function of volt class
            echo ("Adapter of voltage = " . $v12->getVolts() . " volt \n"); //internally calling getVolts function of volt class
            echo ("Adapter of voltage = " . $v120->getVolts() . " volt \n"); //internally calling getVolts function of volt class
            echo "Enter device name to get charge \n";

            //getting string input from user and validating
            $string = Utilioops::taking_string_input();

            //if , elseif and else loop
            if (strcasecmp("mobile", $string) == 0) { //strcasecmp for comparing 2 strings with case insensitive
                echo "mobile is getting charged with " . $v3->getVolts() . " volt\n"; //internally calling getVolts function of volt class
            } else if (strcasecmp("laptop", $string) == 0) {
                echo "laptop is getting charged with " . $v12->getVolts() . " volt\n"; //internally calling getVolts function of volt class
            } else {
                echo "Oops something went wrong \n";
            }
        } catch (Exception $e) {
            echo "\n", $e->getMessage();
        } finally {
            echo ("------------END TESTING ADAPTER PATTERN----------------\n");
            echo ("\n");
        }
    }
    /**
     *Creating function testClassAdapter
     *@param sockAdapter for that particular requirement
     *@param i for that particular requirement
     *@return correspondingVoltage
     */
    private static function getVolt($sockAdapter, $i)
    {
        // switch is used to perform different actions based on different conditions
        switch ($i) {
            case 3:
                return $sockAdapter->get3Volt(); // calling function get3Volt of SocketClassAdapterImpl class to get required volt
                break;
            case 12:
                return $sockAdapter->get12Volt(); // calling function get12Volt of SocketClassAdapterImpl class to get required volt
                break;
            case 120:
                return $sockAdapter->get120Volt(); // calling function get120Volt of SocketClassAdapterImpl class to get required volt
                break;
            default:
                return $sockAdapter->get120Volt(); // calling function get120Volt of SocketClassAdapterImpl class for the default condition
                break;
        }
    }

}
/********************************************************************************************/

//creating new AdapterPatternTest object
$adp = new AdapterPatternTest();

//on AdapterPatternTest object calling testClassAdapter function
$adp->testClassAdapter();