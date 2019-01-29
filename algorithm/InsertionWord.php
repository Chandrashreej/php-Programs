<?php
/*********************************Insertion Sort ***************************************/
include "Util.php";
   $myfile = fopen("tt.txt","r") or die("unable to open");
   $line = fread($myfile,filesize("tt.txt")) ;
   $str = explode(" ",$line);
   $num = sizeof($str);
   Util::insertion_sort_for_num($str, $num);  
?>