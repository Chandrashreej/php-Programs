<?php
/**
 *Creating Utility class for OOPS for reusing the code
 *
 * @author chandrashree j
 * @since 09-01-2019
 */
class Utilioops
{
    /**
     *Creating static function to read JSON file
     * @param ask for .json file
     * @return returns php object;
     */
    public static function read_JSON_File($myInvJSON)
    {
        $strJsonFileContents = file_get_contents($myInvJSON); //file_get_contents converts file to a string
        $myInvObj = json_decode($strJsonFileContents, true); //json_decode converts string to php object
        return $myInvObj;
    }

//*********************************************************************************************************/

    /**
     *Creating static function to calculate the inventory details and also prints the data
     * @param ask for php object
     * @return returns string with all the values of data
     */
    public static function inventory_calculation($myInvObj)
    {
        $output = ""; // created to get string output
        $riceOutput = ""; // created to get string output
        $wheatOutput = ""; // created to get string output
        $pulseOutput = ""; // created to get string output

        echo "\n";
        echo "Rice Inventory details\n";

        //foreach loop: loops untill the end of the index of rice
        foreach ($myInvObj['rice'] as $rice) {
            $riceOutput .= "The total rate of " . $rice['name'] . ", is " . ($rice['weight'] * $rice['rate']) . " Rs \n";
        }
        echo $riceOutput; //printing data to monitor
        echo "\n";
        echo "\n";
        $output .= $riceOutput; //string concatination

        echo "Wheat Inventory details\n";

        //foreach loop: loops untill the end of the index of Wheat
        foreach ($myInvObj['wheat'] as $wheat) {
            $wheatOutput .= "The total rate of " . $wheat['name'] . ", is " . ($wheat['weight'] * $wheat['rate']) . " Rs \n";
        }
        echo $wheatOutput; //printing data to monitor
        echo "\n";
        echo "\n";
        $output .= $wheatOutput; //string concatination

        echo "Pulses Inventory details\n";

        //foreach loop: loops untill the end of the index of pulses
        foreach ($myInvObj['pulses'] as $pulses) {
            $pulseOutput .= "The total rate of " . $pulses['name'] . ", is " . ($pulses['weight'] * $pulses['rate']) . " Rs \n";
        }
        echo $pulseOutput; //printing data to monitor
        echo "\n";
        echo "\n";
        $output .= $pulseOutput; //string concatination

        return $output; // returns string output

    }

//*********************************************************************************************************/

    /**
     *Creating static function to convert php Object back to JSON string
     * @param ask for php object
     * @return returns JSON string
     */
    public static function conv_To_JSON($myInvObj)
    {
        $myJSON = json_encode($myInvObj); //json_encode converts php object to string
        return $myJSON; // returning JSON string
    }
    //*********************************************************************************************************/

    /**
     *Creating static function to get String replace using regex
     * @param ask for firstName, fullName, mobileNumber, currentDate
     * @return returns JSON string
     */
    public static function regex_String_Replace($firstName, $fullName, $mobNum, $currDate, $fileString)
    {
        $fileString =preg_replace('/<<name>>/',$firstName,$fileString);
        $fileString =preg_replace('/<<full name>>/',$fullName,$fileString);
        $fileString =preg_replace('/xxxxxxxxxx/',$mobNum,$fileString);
        $fileString =preg_replace('/01-01-2016/',$currDate,$fileString);
        echo "\n";
        echo $fileString."\n";
    }
    /********************************************************************************************************/
    /**
     *creating the funct to take input from user and returns number
     * @return returns number
     */
    public static function taking_Num_Input()
    {
        fscanf(STDIN, "%s\n", $num);
        // validating untill the user gives correct information
        while ((Utilioops::validating_Float($num)) && !(is_numeric($num))  && ($num<0)){
            echo "Warning :the num should not be decimal and it should not contain char\n";
            fscanf(STDIN, "%s\n", $num);

        }
        return $num;
    }

/****************************************************************************************************************/

    /**
     *creating the funct to take input from user and returns string
     * @return returns string
     */
    public static function taking_string_input()
    {
        fscanf(STDIN, "%s\n", $txt);
        // validating untill the user gives correct information
        while (is_numeric($txt)) {
            echo "Warning:Enter the string with no digits in it:\n";
            fscanf(STDIN, "%s\n", $txt);
        }
        return $txt;

    }
/************************************************************************************************************/
    /**
     *creating the funct to validate float which returns boolean
     * @param ask for number
     * @return returns boolean
     */
    public static function validating_Float($num)
    {
        //  checking wheather the passed num is numeric with check
        if (is_numeric($num) && strpos($num, '.')) {
            return true;
        } else {
            return false;
        }

    }
/************************************************************************************************************/
    /**
     *creating the funct to open and read the content of the file and return same
     * @param ask for file name with extension and to write or read and to write
     * @return returns string
     */
    public static function working_With_File($str, $s, $ryt)
    {
        // if and elseif condition for read or write a file 
        if ($s == "r") {
            $myfile = fopen($str, "r") or die("unable to open");
            $line = fread($myfile, filesize($str));
            //$str = explode(" ", $line);
            return $line;
        } elseif ($s == "w") {
            $myfile = fopen($str, "w") or die("unable to open");
            fwrite($str, $ryt);
            return null;
        }
    }
}
