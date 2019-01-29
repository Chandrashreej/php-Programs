<?php
/**
 *Read a List of Numbers from a file and arrange it ascending Order in a Linked List. 
 *Take user input for a number, if found then pop the number out of the list 
 *else insert the number in appropriate position
 * 
 * 
 * @author chandrashree j
 * @since 09-01-2019
 */
 
 //requires function in the file SinglyLinkedList.php and Utility.php

require 'Utilds.php';
require_once 'SinglyLinkedList.php';
    function cal_Unord()
    {
        try
        {

            echo "Unordered List for String\n";

            // to open and read the file

            $myfile = fopen("file1.txt","r") or die("Unable to open file!");
            $str = fread($myfile,filesize("file1.txt"));

            // spliting the string and creating array
            $arr = explode(" ",$str);

            // creating singlylinkedlist
            $list = new SinglyLinkedList();

            // adding the data from array to list
            for($x=0;$x<count($arr);$x++)
            {
                $list->add($arr[$x]);
            }
            echo "list of strings are : ";
            $list-> printing_data();
            echo "\n";
            echo "enter a str :\n";
            $str = Utilds::taking_string_input();
            
            // searching the data from list
            if($list->search_of_list($str))
            {
                echo "Hey string present in the list \n";
                $list->remove_node($str);
                echo "and modified list is :";
                // printing the data in the list
                $list-> printing_data();
                echo "\n";
            }
            else
            {
                echo "Hey String not present in the list \n";
                $list->add($str);

                echo "and modified list is :";
                $list-> printing_data();
                // printing the data in the list
                echo "\n";
            }
            // to open and write into the file
            $str = $list->listing_of_data();
            $myfile = fopen("file1.txt","w") or die("Unable to open file!");
            fwrite($myfile,$str);
        }

     catch (Exception $e) {
        echo "\n", $e->getMessage();
    }
}
    // calling function cal_Unord
    cal_Unord();
?>