<?php

/**
 * Program that takes the month and year as command-line arguments and
 * prints the Calendar of the month using Queue.
 * 
 * @author chandrashree j
 * @since 09-01-2019
 */
require ("Utilds.php");
require ("Queue.php");

// creating calQueue function
function calQueue()
{
        
    // creating two new Queue for weekdeays and datequeue

    $weekdays = new Queue();
    $dateq = new Queue();
    echo "Enter Month ";
    $month = Utilds::taking_Num_Input();
        
    // taking user input

    while ($month > 12) 
    {
            
        // validating user input

        echo "enter correct month ";
        $month = Utilds::taking_Num_Input();
    }
    echo "Enter Year ";
    $year = Utilds::taking_Num_Input();
       
    // taking user input

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


    // creating array
    $arr = array("Sun", "Mon", "Tue", "Wen", "Thu", "Fri", "sat");
    
    // for looping to give input to enqueue
    for($i=0;$i<count($arr);$i++)
    {
        $weekdays->enqueue($arr[$i]);
    }

    // for looping to give input to enqueue

    for( $i=1;$i<=$totalDays;$i++)
    {
        $dateq->enqueue($i);
    }
    
    // for looping to take input to dequeue

    for($i=0;$i<count($arr);$i++)
    {
        echo $weekdays->dequeue()."  ";
    }
    echo "\n";
    for ($i=0;$i<($start*5);$i++)
    {
        echo " ";
    }


    // for looping to take input to dequeue

    for($i=1;$i<=$totalDays;$i++)
    {
        if($i<10)
        {
            echo(" ".$dateq->dequeue()."   ");
        }
        if($i>9)
        {
            echo("".$dateq->dequeue()."   ");
        }
        if((($start+$i)%7) ==0)
        {
            echo " \n";
        }

    }
    echo " \n";
    echo " \n";
}
// calling calQueue function

calQueue();

?>
