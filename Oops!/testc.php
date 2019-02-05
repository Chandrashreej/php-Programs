<?php
require ('Utilioops.php');
$filename = "chandra.json";
$content = "Content 1 if file no exist will generate";

    if (file_exists('/home/bridgeit/ChandraShree/'. $filename))
    {
       $myobj = Utilioops::read_JSON_File($filename);
        print_r($myobj) ;
    }
    else{
        file_put_contents('/home/bridgeit/ChandraShree/Oops!/'. $filename, FILE_APPEND | LOCK_EX);
    }

?>


