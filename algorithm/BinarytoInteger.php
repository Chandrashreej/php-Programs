<?php
    /*********************************Binary to Decimal and vise verse***************************************/
    require 'Util.php';
    echo "Binary to Decimal and vise verse\n";
    echo "enter the number to covert binary to decimal and vise versa : ";
    $num = Util::taking_num_input();
    /* method calling from util class */
    $num =Util::binary_to_decimal($num);
?>