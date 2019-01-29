<?php

/**
 * Program that takes the month and year as command-line arguments and
 * prints the Calendar of the month using 2 stacks.
 * 
 * @author chandrashree j
 * @since 09-01-2019
 */
require ("Utilds.php");
require ("Stack.php");

// creating calstack function
function calStack()
{
    // creating two new LinkedListStack for weekdeays and datequeue
    $weekdays = new LinkedListStack();
    $dateq = new LinkedListStack();
    echo "\n\n";
   
    echo "Enter Month ";        
    // taking user input
    $month = Utilds::taking_Num_Input();

    while ($month > 12) 
    {                     
        // validating user input
        echo "enter correct month ";
        $month = Utilds::taking_Num_Input();
    }

    echo "Enter Year ";       
    // taking user input
    $year = Utilds::taking_Num_Input();

    while ($year < 1000) 
    {     
        // validating user input
        echo "enter correct year ";
        $year = Utilds::taking_Num_Input();
    }

        
    // calling calTotal function from Utilds class

    $totalDays = Utilds::calculateEnd($month, $year);
        
    // calling day_of_week_cal function from Utilds class

    $start = Utilds::day_of_week_cal(1, $month, $year);
    //creating array 
    $arr = array("Sun", "Mon", "Tue", "Wen", "Thu", "Fri", "sat");
    
    // for looping to give input to push
    for($i=count($arr)-1;$i >= 0;$i--)
    {
        $weekdays->push($arr[$i]);
    }

    // for looping to give input to push

    for( $i = $totalDays;$i >=1;$i--)
    {
        $dateq->push($i);
    }
    
    // for looping to take input to pop

    for($i=0;$i<count($arr);$i++)
    {
        echo $weekdays->pop()."  ";
    }

    echo "\n";

    for ($i=0;$i<($start*5);$i++)
    {
        echo " ";
    }
    
    // for looping to take input to pop

    for($i=1;$i<=$totalDays;$i++)
    {
        if($i<10) 
        {
            echo(" ".$dateq->pop()."   ");
        }
        if($i>9)
        {
            echo("".$dateq->pop()."   ");
        }
        if((($start+$i)%7) ==0)
        {
            echo " \n";
        }

    }
    echo "\n\n";
}
// calling calStack function

calStack();

?>
