<?php
/**
 * program to replace the string using regex and printing the data to monitor.
 * 
 * @author chandrashree j
 * @since 09-01-2019
 */

// requires below .php file to work on
require "Utilioops.php";

//enabling try catch
try{


    //taking first name from user
    echo "Enter the first name :\n";
    $firstName = Utilioops::taking_string_input(); //validating the name

    //taking number of words present in their name if needed
    echo "Enter the no. of words present in full name :\n";
    $n = Utilioops::taking_Num_Input(); //validating the num

    // based on the number provided by user taking front , middle, last name
    if ($n == 1) {

        // this loop is working only when user has only one word in his/her name
        echo "Enter the fullName :\n";
        $fullName = Utilioops::taking_string_input(); //validating the name

    } elseif ($n == 2) {

        // this loop is working only when user has only two words in his/her name
        echo "Enter the frontName :\n";
        $frontName = Utilioops::taking_string_input(); //validating the name

        echo "Enter the MiddleName :\n";
        $midName = Utilioops::taking_string_input(); //validating the name

        $fullName = "" . $frontName . " " . $midName;

    } elseif ($n == 3) {

        // this loop is working only when user has only three words in his/her name
        echo "Enter the frontName :\n";
        $frontName = Utilioops::taking_string_input(); //validating the name

        echo "Enter the MiddleName :\n";
        $midName = Utilioops::taking_string_input(); //validating the name

        echo "Enter the lastName :\n";
        $lastName = Utilioops::taking_string_input(); //validating the name

        $fullName = "" . $frontName . " " . $midName . " " . $lastName;

    } else {

        // this loop is working only when user has four or above words in his/her name
        echo "Invalid name couldnt give so much space!!!\n";
        return;

    }

    // taking number input from user
    echo "Enter the mobNum :\n";
    $mobNum = Utilioops::taking_Num_Input(); //validating the num

    while (strlen($mobNum) != 10) {

        // loop works only when the mobile number is not 10 digit
        echo "Enter the mobNum and digits should be 10 :\n";
        $mobNum = Utilioops::taking_Num_Input(); //validating the num

    }

    // to calculate current date
    $currDate = date("d/m/Y");

    // temporary string to get file name
    $str = "StringReplace.txt";

    // to open and read the file and get data from the file
    $fileString = Utilioops::working_With_File($str, "r", "ok");

    // calling regex_String_Replace function where the actual logic is done
    Utilioops::regex_String_Replace($firstName, $fullName, $mobNum, $currDate, $fileString);

} catch (Exception $e) {
    // to print the messeage
    echo "\n", $e->getMessage();
}
?>
