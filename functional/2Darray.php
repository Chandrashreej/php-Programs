<?php
    include 'Utility.php';
    echo "2 Dimensional Array\n";

    echo "enter the number of rows\n";
    $row =  Utility::takingnuminput();
    echo "enter the number of columns\n";
    $column =  Utility::takingnuminput();
    Utility::calling_2Darray($row, $column);

?>