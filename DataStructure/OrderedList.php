<?php

/**
 * Program that read the Text from a file, 
 * split it into words and arrange it as Linked List. 
 * Take a user input to search a Word in the List. 
 * If the Word is not found then add it to the list,
 * and if it found then remove the word from the List. 
 * In the end save the list into a file 
 *
 * 
 * @author chandrashree j
 * @since 09-01-2019
 */

 //requires function in the file SinglyLinkedList.php and Utility.php

    require 'Utilds.php';
    require_once 'SinglyLinkedList.php';

    function cal_Ord()
    {
        echo "Ordered List for Numbers\n";
        // to open and read the file
        $myfile = fopen("file.txt","r") or die("Unable to open file!");
        $str = fread($myfile,filesize("file.txt"));
                            
        // spliting the string and creating array
        $arr = explode(" ",$str);

        // creating singlylinkedlist
        $list = new SinglyLinkedList();
            
        // adding the data from array to list
        for($x=0;$x<count($arr);$x++)
        {
            $list->add_Of_Ordered_data($arr[$x]);
        }
        echo "list of numbers are\n";
        // printing the data
        $list-> printing_data();
        echo "\n";

        echo "enter a number :\n";

        // taking user input
        $num = Utilds::taking_Num_Input();
        // searching data from list
        if($list->search_of_list($num))
        {
            echo "Hey Number present in the list\n";
            // removing the data feom list
            $list->remove_node($num);
            echo "and modified list is :";
            // printing the data
            $list-> printing_data();

        }
        else
        {
            echo "Hey Number not present in the list\n";
            // adding the data to list
            $list->add_Of_Ordered_data($num);

            echo "and modified list is :";
            // printing the data
            $list-> printing_data();
            echo "\n";
        }
        // listing the data and concatinating all the data to string
        $str = $list->listing_of_data();
        // opening the file and writing into it
        $myfile = fopen("file.txt","w") or die("Unable to open file!");
        fwrite($myfile,$str);
    }
    // calling cal_ord function
    cal_Ord();
?>