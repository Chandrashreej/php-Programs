<?php

include "Utility.php";

$varl1=Utility::takingnuminput();
if($varl1>0)
{
//  if( is_float($varl1))
//  {
//     echo  "true". $varl1;
//  }
//  else
//  {
//     echo  "true121212". $varl1;
//  }

      if(strpos($varl1, '.') )
      {
         echo "true";
      }
      else
      {
         echo "false";
      }

}

?>