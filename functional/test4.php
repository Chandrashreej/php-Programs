<?php
function takingnuminput()
{   echo "1";
    include "Utility.php";
    {   echo "2";
        fscanf(STDIN, "%s\n",$num);
        echo "3";
        while((Utility::validating_float($num)) || (Utility::validating_str($num)))
        {
            echo "Warning :the num should not be decimal and it should not contain char\n";
            Utility::takingnuminput();
        }
        echo $num;
        
    }
    takingnuminput();
}
?>