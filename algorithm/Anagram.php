<?php
    /*********************************Anagram***************************************/
    require 'Util.php';
    echo "Anagram\n";
    echo "Enter your first string: \n";
    $str =  Util::taking_string_input();
    echo "Enter your second string: \n";
    $anstr=  Util::taking_string_input();
    /* method calling util class */
    Util::anagram_detection($str,$anstr);
?>