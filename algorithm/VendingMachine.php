<?php
    /*********************************Vending Machine***************************************/
    require 'Util.php';
    echo "Vending Machine\n";
    echo "Enter your amount \n";
    $amount =  Util::taking_num_input();
    while($amount <= 0)
    {
        echo "Warning : Invalid amount! amount should be greater than 0\n";
        $amount =  Util::taking_num_input();
    }

    /* method calling util class */
    Util::vending_machine_rs_generator($amount,0,0);
?>