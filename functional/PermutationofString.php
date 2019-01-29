<?php
    include 'Utility.php';
    echo "To return all permutation of a String\n";
    echo "enter the string\n";
    $str = Utility::takingstringinput();
    $n = strlen($str);
    $i=0;
    //Utility::swap_string();
    Utility::string_permutation($str,$i,$n-1);
?>