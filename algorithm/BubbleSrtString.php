<?php
    /*********************************Bubble sort for String***************************************/
    require 'Util.php';
    echo "Bubble sort for String\n";
    echo "Enter the length of array: \n";
    $num =  Util::taking_num_input();
    $z =0;
    
    while($num == 0)
    {
       echo "Enter the length greater than 0: \n";
        $num =  Util::taking_num_input();
    }

    $arr = array();

    while($num != sizeof($arr))
    {
        echo "Enter the values for array: \n";
        $txt =  Util::taking_string_input();
        $arr[$z]=$txt;
        $z++;
    }

    /* method calling from util class */
    Util::bubble_sort_for_str($arr, $num);
?>