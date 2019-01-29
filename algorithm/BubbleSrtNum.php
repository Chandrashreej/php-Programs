<?php
    /*********************************Bubble sort for Number***************************************/
    require 'Util.php';
    echo "Bubble sort for Number\n";
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
        $number =  Util::taking_num_input();
        $arr[$z]=$number;
        $z++;
    }

    /* method calling from util class */
    Util::bubble_sort_for_num($arr, $num);
?>