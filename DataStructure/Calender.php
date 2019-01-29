<?php

/**
 * Program that takes the month and year as command-line arguments and
 * prints the Calendar of the month.
 * 
 * @author chandrashree j
 * @since 09-01-2019
 */

//  requires Utilds.php
require ("Utilds.php");

function calender()
{
    echo "Enter Month btw 1 t0 12 : ";
            // taking user input
    $month = Utilds::taking_Num_Input();

    while ($month > 12) 
    {
        echo "warning : enter correct month\n";
                // validating user input
        $month = Utilds::taking_Num_Input();
    }

    echo "Enter Year greater than 1000 and less than 9999 : ";
            // taking user input
    $year = Utilds::taking_Num_Input();

    while ($year < 1000 ||$year > 9999) 
    {
        echo "warning : enter correct year\n";
                // validating user inputs
        $year = Utilds::taking_Num_Input();
    }

    $arrYear=array("jan","feb","march","april","may","june","july","aug","sep","oct","nov","dec");
    // calling initArray function from Utilds class
    $cal = Utilds::initArray();
       
    // calling day_of_week_cal function from Utilds class

    $start = Utilds::day_of_week_cal(1, $month, $year);
    $end = Utilds::calculateEnd($month, $year);
    
    // calling arrayFill function from Utilds class

    $cal = Utilds::arrayFill($start, $cal, $end);
    echo "\n";
    echo " Month : ".$arrYear[$month -1]." --- Year : ".$year."\n";
    echo "\n";

        
    // calling printCal function from Utilds class

    Utilds::printCal($cal);
    echo "\n";
    
}
    
// calling calender function

calender();
?>