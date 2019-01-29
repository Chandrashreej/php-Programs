<?php

/**
 *  Prime Numbers that are Anagram in the Range of 0 - 1000 in a Queue using the Linked List and
 *  Print the Anagrams from the Queue
 * 
 * @author chandrashree j
 * @since 09-01-2019
 */
  
 //require functions in below files to work 

require("Queue.php");
require("Utilds.php");
    
// creating queue_Anag function

function queue_Anag()
{
    // creating new queue
    $que = new Queue();

    //calling get_prime function of Utilds
    $arr = Utilds::get_prime(1000);
    
    // for loop for reference
    for ($i = 0; $i < count($arr); $i++)
    {
        
        // for loop which actually gets compared
        for ($j = 0; $j < count($arr); $j++) 
        {
            // because the element should not get compared to same position
            if ($i != $j) 
            {
                //calling anagram function of Utilds
                if (Utilds::is_Anagram($arr[$i], $arr[$j])) 
                {
                    // adding numbers which are anagaram And is prime to queue using enqueue function
                    $que->enqueue($arr[$i]);
                    break;
                }
            }
        }
    }
    // printing to next line
    echo "\n";
    echo "\n";
    echo "Anagrams in Queue Are :\n\n";
    // dequeuing the queue untill it becomes empty
    while(!$que->isEmpty())
    {
    echo $que->dequeue()." , ";
    }
    echo "\n";
}
// calling queAna function
queue_Anag();
?>