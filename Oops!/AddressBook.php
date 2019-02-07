<?php
/**
 * Program that can be used to maintain an address book.
 * An address book holds a collection of entries,
 * each recording a person's first and last names,
 * address, city, state, zip, and phone number.
 *
 * @since 09-01-2019
 * @author chandrashreej
 */

// requires below .php file to work on
require 'Utilioops.php';

/**
 * creating class person for address book
 */
class Person
{
    public $firstName; //global variable for first name
    public $lastName; //global variable for last name
    public $address; //global variable for address
    public $city; //global variable for city
    public $state; //global variable for state
    public $zip; //global variable for zip
    public $mobNum; //global variable for phone num
}

/**
 * function to create person
 * @param addressbook array is passed
 */
function createPerson(&$addressBook)
{
    $person = new Person(); //creating new person object

    echo "Enter Firstname \n";
    $person->firstName = Utilioops::taking_string_input(); //taking user input and validating in utilioops

    echo "Enter Lastname \n";
    $person->lastName = Utilioops::taking_string_input(); //taking user input and validating in utilioops

    echo "Enter State\n";
    $person->state = Utilioops::taking_string_input(); //taking user input and validating in utilioops

    echo "Enter City of $person->state\n";
    $person->city = Utilioops::taking_string_input(); //taking user input and validating in utilioops

    echo "Enter Zip of $person->city\n";

    $person->zip = validInt(Utilioops::taking_Num_Input(), 100000, 10000000); //valdating user input and assigning

    echo "Enter Address\n";
    $person->address = Utilioops::taking_string_input(); //taking user input and validating in utilioops

    echo "Enter Mobile Number \n";
    $person->mobNum = validInt(Utilioops::taking_Num_Input(), 1000000000, 10000000000); //valdating user input and assigning

    $addressBook[] = $person; //adding person object data to array
}

/**
 * function to edit person details
 * @param person object to make changes
 * @return nothing
 */
function edit(&$person)
{
    echo "Enter 1 to change Address : \n Enter 2 change Mobile Number :\n";
    $choice = Utilioops::taking_Num_Input(); //taking user input and validating in utilioops

    //switch condition with given choice
    switch ($choice) {

        case '1':
            //loop works when 1 is selected (i.e, for changing address)
            echo "Enter State : \n";
            $person->state = Utilioops::taking_string_input(); //taking user input and validating in utilioops

            echo "Enter City : \n";
            $person->city = Utilioops::taking_string_input(); //taking user input and validating in utilioops

            echo "Enter Zip of $person->city :\n";
            $person->zip = validInt(Utilioops::taking_Num_Input(), 100000, 10000000); //valdating user input and assigning

            echo "Enter Address :\n";
            $person->address = Utilioops::taking_string_input(); //taking user input and validating in utilioops

            echo "Address changed !!! \n";

            break;

        case '2':

            //loop works when 2 is selected (i.e, for mobile number)
            echo "Enter Mobile Number :\n";
            $person->mobNum = validInt(Utilioops::taking_Num_Input(), 1000000000, 10000000000); //valdating user input and assigning

            echo "Mobile Number changed !!!\n";

            break;

        default:
            // works under default case when user doesnt give choice correctly
            break;
    }
}
/**
 * function to delete person details
 * @param arr to delete object
 * @return nothing
 */
function delete(&$arr)
{
    $i = search($arr); // search function is called and get the place value
    if ($i > -1) {
        array_splice($arr, $i, 1); // array_splice deletes the data
        echo "Entry Deleted !!!\n";
    } else {
        echo "Entry Not Found !!!\n";
    }
    fscanf(STDIN, "%s\n"); //taking any input
}
/**
 * function to search the person object in particular address book
 * @param arr to serach in
 * @return num of that place
 */
function search($arr)
{
    echo "Enter first name to search :\n";
    $firstName = Utilioops::taking_string_input(); //taking user input and validating in utilioops

    echo "Enter last name : \n";
    $lastName = Utilioops::taking_string_input(); //taking user input and validating in utilioops

    //loops untill the end of array
    for ($i = 0; $i < count($arr); $i++) {

        if ($arr[$i]->firstName == $firstName) { //searching first name in array

            if ($arr[$i]->lastName == $lastName) { //searching last name in array when first name matches

                return $i; // returning the place value
            }
        }
    }
    return -1; //if not found return -1
}
/**
 * function to print as " mailing lable " format
 * @param arr to print
 * @return num of that place
 */
function printBook($arr)
{
    //foreach loop to get all the person object from array
    foreach ($arr as $person) {

        // printing the data
        echo sprintf("%s %s\n%s\n%s, %s\nZip - %u\nMobile- %u\n\n", $person->firstName, $person->lastName, $person->address, $person->city, $person->state, $person->zip, $person->phone);
    }
}
/**
 * function to sort the array
 * @param arr the array to sort persons
 */
function sortBook(&$arr, $prop)
{
    for ($i = 1; $i < count($arr); $i++) {

        // getting value for back element
        $j = ($i - 1);

        //saving it in temperary variable;
        $temp = $arr[$i];

        //looping to sort using swap
        while ($j >= 0 && $arr[$j]->{$prop} >= $temp->{$prop}) {

            $arr[$j + 1] = $arr[$j];
            $j--; //decrementing j value by 1
        }
        $arr[$j + 1] = $temp; // copying from temp to arary
    }
}
/**
 * function to save the Address book if modified
 * @param addressbook and filename to work
 * @return nothing
 */
function save($addressBook, $filename)
{

    file_put_contents($filename, json_encode($addressBook)); //file_put_contents function puts all the conent to .json file
}
/**
 * function to validate int
 * @param int,min,max, the values to validate int
 * @return integervalue
 */
function validInt($intger, $min, $max)
{
    //valid filtering for all integers for given max min value
    while (filter_var($intger, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {

        echo "Integer value is not in the range !!!\n";
        echo "Enter the value again : ";

        $intger = Utilioops::taking_Num_Input(); //taking user input and validating in utilioops
    }
    return $intger; //return the int value
}
/**
 * function to create or work on Address Book
 * @param nothing
 * @return arr to continue
 */
function createAddressBook()
{
    echo "filename\n";
    $filename = Utilioops::taking_string_input(); //taking user input and validating in utilioops

    if (file_exists('/home/bridgeit/ChandraShree/Oops!/' . $filename)) {

        $arr = Utilioops::read_JSON_File($filename); //calling read_JSON_File from utilioops to get array

        return $arr; //return the array

    } else {

        file_put_contents('/home/bridgeit/ChandraShree/Oops!/' . $filename, null);

        $arr = Utilioops::read_JSON_File($filename); //calling read_JSON_File from utilioops to get array

        return $arr; //return the array
    }

}
/**
 * function where actually user gets interacted
 * @param addressbook to work on
 * @return nothing
 */
function menu($addressBook)
{

    echo "\n-------Address Book--------\n\n Press 1 to add person :\n Press 2 to edit a person :\n Press 3 to delete a person : \n Press 4 to sort and Display : \n Press 5 to search : \n Press 6 to save : \n Press anything to exit :\n";
    $ch = Utilioops::taking_Num_Input(); //taking user input and validating in utilioops

    //switch function for selected choice
    switch ($ch) {

        case '1':

            //when 1 is selected
            createPerson($addressBook); //calling creating person

            menu($addressBook); //calling menu function

            break;

        case '2':

            //when 2 is selected
            $num = 2;

            while (($i = search($addressBook)) === -1) {

                var_dump($i);

                echo "No enteries Found : \n Press 1 to exit to --MENU-- or Else to search again\n";
                fscanf(STDIN, "%s\n", $num);

                if ($num == 1) { //depending on user input it enters

                    break;
                }
            }

            if ($k == 1) {
                menu($addressBook); //calling menu function
            } else {
                $addressbook[$i] = edit($addressBook[$i]);
            }

            menu($addressBook); //calling menu function

            break;

        case '3':

            //when 3 is selected
            delete($addressBook); //calling deleting function

            menu($addressBook); //calling menu function

            break;

        case '4':

            //when 4 is selected
            echo "Enter 1 to sort by Name : \nEnter 2 to sort by Zip : \n Any num to Menu :";
            $c = Utilioops::taking_Num_Input(); //taking user input and validating in utilioops

            if ($c == 1) {

                sortBook($addressBook, "fname"); //sorting the data

                printBook($addressBook); //printing the data

            } else if ($c == 2) {

                sortBook($addressBook, "zip"); //sorting the data

                printBook($addressBook); //printing the data

            } else {

                menu($addressBook); //calling menu function

            }

            fscanf(STDIN, "%s\n");

            menu($addressBook); //calling menu function

            break;

        case '5':

            $i = search($addressBook); //calling search function to search data

            if ($i > -1) {

                $arr = []; //creating array

                $arr[] = $addressBook[$i]; //adding all the data to temp aaray

                printBook($arr); //calling printBook function to print data

            }
            echo "\n";
            fscanf(STDIN, "%s\n");

            menu($addressBook); //calling menu function

            break;

        case '6':
            echo "filename to save\n";
            $filename = Utilioops::taking_string_input();
            save($addressBook, $filename); //calling save function to save files

            echo "\nSaved succesfully\n";

            menu($addressBook); //calling menu function

            break;

        default:
            {
                echo "---------Quiting the Address Book---------\n";
                mainMenu(); //calling mainmenu function
                return;
            }

    }
}
/**
 * function first user interaction
 * @param nothing
 * @return nothing
 */
function mainMenu()
{
    $firstChoice = 0;

    echo "\n Press 1 to create new Address Book : \n Press 2 to work the Address book :\n Press 3 to exit the app :\n";
    $firstChoice = Utilioops::taking_Num_Input(); //taking user input and validating in utilioops

    //looping through for selected choice
    while ($firstChoice != 3) {

        if ($firstChoice == 1) {

            $addressBook = createAddressBook(); //calling createAddressBook function to create object
            echo "Press 2 to work with same file \n";
            mainMenu();

            menu($addressBook); //calling menu function

            mainMenu(); //calling mainmenu function

        } elseif ($firstChoice == 2) {

            $addressBook = createAddressBook();

            menu($addressBook); //calling menu function

            mainMenu(); //calling mainmenu function

        } else {

            echo "----Quit Application---"; //exiting the app

            return;
        }

    }
    echo "----Quit Application---!!!!"; //exiting the app
    return;
}
mainMenu(); //calling mainmenu to interact with user
