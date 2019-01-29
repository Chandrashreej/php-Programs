<?php
/**
 * Create a Slot of 10 to store Chain of Numbers that belong to each Slot to efficiently search a 
 * number from a given set of number
 * 
 * @author chandrashree j
 * @since 09-01-2019
 */
//  requires Utilds.php and Stack.php
require 'Utilds.php';
require_once 'SinglyLinkedList.php';


function hasing_Function()
{
    // to open and read the file
    $myfile = fopen("file.txt","r") or die("Unable to open file!");
    $str = fread($myfile,filesize("file.txt"));

    // spliting the string and creating array
    $numarr = explode(" ",$str);
    $arr = [];

    // looping fcrom 0 till 11 so that you get 10 rows 
    for($i=0;$i<11;$i++)
    {
        // creating singlylinkedlist for each row or array
        $arr[$i] = new SinglyLinkedList();
    }
    // adding the data from 0 till the array size to the linked list which are divided by 11
    for ($i=0;$i<count($numarr);$i++) 
    {
        $l = (int)$numarr[$i]%11;
        $arr[$l]->add_Of_Ordered_data((int)$numarr[$i]);
    }

    // listing the array to get every strings
    function listArr($arr)
    {
        $s = "";
        for ($i=0;$i<count($arr);$i++) 
        {
            // looping to get string
            if($arr[$i]->getString()!=null)
            $s .= $arr[$i]->getString()." ";
        }
        return substr($s,0 ,-1)."\n";
    }
    echo "list is ".listArr($arr);
    echo "Enter no to search\n";
    // calling taking_Num_Input function from Utilds
    $num = Utilds::taking_Num_Input();
    $y = (int)$num%11;
    // searching of data
    if($arr[$y]->search_of_list($num))
    {
        echo "number found \n";
        // removing the element if present in list
        $arr[$y]->remove_node($num);
    }
    else
    {
        
        // adding the element if present in list
        echo "number not found \n";
        $arr[$y]->add_Of_Ordered_data($num);
        echo "added to the list \n";
    }
    // to open and read the file
    $myfile = fopen("file.txt","w") or die("Unable to open file ");
    fwrite($myfile,listArr($arr));
    fclose($myfile);
}
// calling hashing function
hasing_Function();
?>