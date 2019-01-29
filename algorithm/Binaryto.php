<?php
    /*********************************Decimal to Binary***************************************/
    require 'Util.php';
    echo "Decimal to Binary\n";
    $num = Util::taking_num_input();
    /* method calling from util class */
    $str = Util::decimal_to_binary($num);
    echo "The binary value of decimal $num is $str ";
?>