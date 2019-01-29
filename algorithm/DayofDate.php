<?php
/*********************************Day of Week ***************************************/
    include "Util.php";
    echo "Day of Week\n";





    echo "Enter the date btw 1 to 30 \n";
    $d =  Util::taking_num_input();
    while(!($d >=1 &&  $d <= 31))
    {
    echo "warning : day should be btw 1 to 30 \n";
    $d = Util::taking_num_input();
    }


    echo "Enter 1 for January, 2 for February, and so forth. \n";
    $m =  Util::taking_num_input();

    while(!($m > 0 &&  $m < 13))
    {
    echo "Warning : month should be btw 1 and 12\n";
    $m = Util::taking_num_input();
    }

    echo "Enter the year \n";
    $y =  Util::taking_num_input();

    while(!(strlen($y) == 4))
    {
    echo "year should contain 4 digits:\n";
    $y = Util::taking_num_input();
    }
    Util::day_of_week_cal($d, $m, $y);
?>