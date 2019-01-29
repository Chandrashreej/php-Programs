<?php
    //include "Utility.php";
    function takingnuminput()
    {
        fscanf(STDIN, "%s\n",$num);
        while( ($num == 0) || (is_float($num)))
        {
            echo "number should be greater than 0 and number should not be decimal \n";
            fscanf(STDIN, "%s\n",$num);
        }
        echo "correct". $num;
    }
    takingnuminput();

?>