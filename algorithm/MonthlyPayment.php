<?php
    /*********************************Monthly Payment***************************************/
    require 'Util.php';
    echo "Monthly Payment\n";
   
    echo "Enter the principal loan amount \n"; 
    $P =  Util::taking_num_input();

    echo "Enter the year \n";
    $Y =  Util::taking_num_input();

    echo "Enter the rate per cent interest compounded monthly \n";
    $R =  Util::taking_num_input();

    /* method calling util class */
    Util::monthly_payment($P, $Y,$R);
?>