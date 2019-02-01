<?php

// $myObject->name = "john";
// $myObject->age =30;
// $myObject->city ="new york";
// $strJsonFileContents = file_get_contents("Inventory.json");
// $myInvObj = json_decode($strJsonFileContents,true);




// echo $myInvObj["rice"][0]['name'];



// $output= "";
// foreach($myInvObj['pulses'] as $pulses )
// {
//     $output .="The total rate of ".$pulses['name'].", is ".( $pulses['weight']*$pulses['rate'])."\n";
// }
// echo $output;
// **********************************************************************************************************

//    $copy_date = "Copyright 1999";
//    $copy_date = preg_replace("(1999)", "2000", $copy_date);
   
//    print $copy_date;


// $text = "We at Guru99 strive to make quality education affordable to the masses. Guru99.com";

// // $text = preg_replace("/Guru/", 'chandu', $text);
// $worry =preg_replace("/(#\whryr+)/", "hi", $text);
// // echo $text;
// echo "\n".$worry;
$string = 'April 15, 2003';
$pattern = '/(\d+) (\d+), (\d+)/i';
$replacement = '${1}1,$3';
echo preg_replace($pattern, $replacement, $string);
?>


