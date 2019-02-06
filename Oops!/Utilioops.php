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
        $fileString = preg_replace('/<{2}\w+>{2}/', $firstName, $fileString); //replaces <<name>> with firstname

        $fileString = preg_replace('/<{2}\w+\s\w+>{2}/', $fullName, $fileString); //replaces <<full name>> with fullName

        $fileString = preg_replace('/\d{2}.\d{2}.\d{4}/', $currDate, $fileString); //replaces 01-01-2016 with currDate

        $fileString = preg_replace('/\d{2}.x{10}/', $mobNum, $fileString); //replaces xxxxxxxxxx with mobNum

        echo "\n";

        //printing to the monitor
        echo $fileString . "\n";
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
        while ((Utilioops::validating_Float($num)) || (!(is_numeric($num)))) { //calling validating_Float and is_numeric func to validate
            echo "Warning :the num should not be decimal and it should not contain char\n";
            $num = Utilioops::taking_Num_Input();

        }
        return $num;
    }
    /********************************************************************************************************/
    /**
     *creating the funct to take input from user and returns number
     * @return returns number
     */
    public static function phone_Num()
    {
        //taking input from user
        $str = readline(" ");
        //validation for phone num
        while (!(preg_match("/^[0-9]{2}-[0-9]{10}$/", $str))) {
            echo "enter a valid number \n";
            //calling function again if in case not valid
            $str = Utilioops::phone_Num();
        }
        return $str;
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

            $myfile = fopen($str, "r") or die("unable to open"); //to open the file
            $line = fread($myfile, filesize($str)); //to read the file

            return $line; // returns what is in file

        } elseif ($s == "w") {

            $myfile = fopen($str, "w") or die("unable to open"); //to open the file
            fwrite($str, $ryt); //to write in file
            return null; //returns null

        }
    }

/*****************************************************************************************************/
    /**
     *creating the funct insertionSortForStr
     * @param ask for $array and length of array
     * @return returns array
     */
    public static function insertionSortForStr($arr, $num)
    {
        for ($i = 1; $i < $num; $i++) {

            for ($j = $i; $j > 0; $j--) {

                if ($arr[$j - 1] > $arr[$j]) {

                    $temp = $arr[$j - 1];
                    $arr[$j - 1] = $arr[$j];
                    $arr[$j] = $temp;
                }

            }

        }
        return $arr;

    }
/*****************************************************************************************************/
    /**
     *creating the funtion to but stocks from the list and add it to the account
     * @param ask for account
     * @return returns account
     */

    public static function buy($account)
    {
        //list var to store the list the stock to purachase from
        $list = Utilioops::printStockList();

        //asking use rfor input
        echo "Enter No with Stock To Buy : ";

        //var ch to store stock to buy
        $ch = Utilioops::validInt(Utilioops::taking_Num_Input(), 1, 8);

        echo $list[$ch - 1]->name . " selected!\n";

        echo "Enter No Of Shares To Buy of " . $list[$ch - 1]->name . " : ";

        //amount to store the no of shares to buy
        $amnt = Utilioops::validInt(Utilioops::taking_Num_Input(), 0, $list[$ch - 1]->Quantity);

        if ($account[0]->account < ($list[$ch - 1]->price * $amnt)) {
            echo " Insufficient fund\n";
            return;
        }
        $list[$ch - 1]->Quantity -= $amnt;
        Utilioops::saveList($list);
        //getting the stock from the list
        $stock = $list[$ch - 1];
        //creating new stock
        $stock = new StockData($stock->name, $stock->price, $amnt);
        //adding the stock to the account if already in the list and return
        $account[0]->account -= $amnt;
        for ($i = 1; $i < count($account); $i++) {
            if ($account[$i]->name == $stock->name) {
                $account[$i]->quantity += $stock->quantity;
                echo "Bought $stock->quantity " . "$stock->name shares successfully";
                Utilioops::saveAccount($account);
                return $account;
            }
        }
        //or else adds the new stack the end pf the list
        $account[] = $stock;
        echo "Bought $stock->quantity " . "$stock->name shares successfully";
        //waiting for user to see the result
        Utilioops::saveAccount($account);
        return $account;
    }
/*****************************************************************************************************/
    /**
     *creating the funct save list
     * @param ask for list
     * @return nothing
     */
    public static function saveList(&$list)
    {
        file_put_contents("Companyshare.json", json_encode($list));
    }

/*****************************************************************************************************/
    /**
     *creating the funct save Account in user
     * @param ask for list
     * @return nothing
     */
    public static function saveAccount($account)
    {
        file_put_contents("UserShare.json", json_encode($account));
    }
/*****************************************************************************************************/
    /**
     *function to print the list the stocks available to buy
     * @param ask for int value
     * @return returns list
     */
    public static function printStockList(int $s = 0)
    {
        $list = json_decode(file_get_contents("Companyshare.json"));
        if ($s === 0) {
            echo "No | Stock Name | Share Price | Available\n";
            $i = 0;
            foreach ($list as $key) {
                echo sprintf("%-1u. | %-10s | Rs %-12u | %-9u", ++$i, $key->name, $key->price, $key->Quantity) . "\n";
            }
        }
        return $list;
    }
/*****************************************************************************************************/
    /**
     *creating the funct sell the list
     * @param ask for $array and length of array
     * @return returns array
     */
    public static function sell($account)
    {
        //show the stock from the list to the user
        Utilioops::printAccount($account);
        //taking the user input
        echo "Enter No with Stock To Sell : ";
        //validating the input
        $ch = Utilioops::validInt(Utilioops::taking_Num_Input(), 1, count($account));
        echo $account[$ch]->name . " selected!\nEnter No Of Shares To Sell of " . $account[$ch]->name . " : ";
        $qt = Utilioops::validInt(Utilioops::taking_Num_Input(), 1, $account[$ch]->quantity);
        //removing the stock
        $account[$ch]->quantity -= $qt;
        $list = Utilioops::printStockList(1);
        $list[$ch - 1]->Quantity += $qt;
        $account[0]->account += ($qt * $list[$ch - 1]->price);
        Utilioops::saveList($list);
        Utilioops::saveAccount($account);
        echo "sold $qt shares successfully";
        //check if the shares are empty to delete the entry completely
        if ($account[$ch]->quantity == 0) {
            array_splice($account, ($ch), 1);
        }
        return $account;
    }
/*****************************************************************************************************/
    /**
     *creating the funct validate int value
     * @param ask int max and min value
     * @return returns int
     */
    public static function validInt($int, $min, $max)
    {
        while (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {
            echo ("Variable value is not within the legal range\n");
            echo "enter again : ";
            $int = Utilioops::taking_Num_Input();
        }
        return $int;
    }
/*****************************************************************************************************/
    /**
     *creating the function print the stock currently in the stock
     * @param ask account
     * @return returns nothing
     */
    public static function printAccount($account)
    {
        echo "No | Stock Name | Share Price | No. Of Shares | Stock Price \n";
        $i = 0;
        for ($i = 1; $i < count($account); $i++) {
            $key = $account[$i];
            echo sprintf("%-2u | %-10s | rs %-8u | %-13u | rs %u", $i, $key->name, $key->price, $key->quantity, ($key->quantity * $key->price)) . "\n";
        }
    }
/*****************************************************************************************************/
    /**
     *creating the function to display the report of the stocks
     * @param ask account
     * @return returns nothing
     */

    public static function report($account)
    {
        $total = 0;
        echo "Stock Name | Per Share Price | No. Of Shares | Stock Price\n";
        for ($i = 1; $i < count($account); $i++) {
            $key = $account[$i];
            echo sprintf("%-10s | rs %-12u | %-13u | rs %u", $key->name, $key->price, $key->quantity, ($key->quantity * $key->price)) . "\n";
            $total += ($key->quantity * $key->price);
        }
        echo "\n";
        echo "Total Value Of Stocks is : " . $total . " rs\namount left in account : " . $account[0]->account . "\n\n";
    }
}
