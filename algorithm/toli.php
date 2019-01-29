<?php 
function play()
{
    $binvalue= "01011101";
$mid = strlen($binvalue)/2;
$sum =0;
$count = 0;
$count1 = 0;
$string ="";

for($index =$mid ;$index <strlen($binvalue);$index++)
{
    $string= $string.$binvalue[$index];
    echo "in 2nd loop ".$string."\n ";
}
for($index =0 ;$index <$mid;$index++)
{
    $string= $string.$binvalue[$index];
    echo "in 1nd loop ".$string."\n ";
}
ECHO " SWAPPED ".$string ."\n";

for($index =0 ;$index <strlen($string);$index++)
{
   if($string[$index] == 1)
   {
       $count1++;
   }
}
for($index =strlen($string)-1 ;$index >=0;$index--)
{
   echo $string[$index];
   if($string[$index]==1)
   {
       $sum =($sum+ pow(2,$count)*1);
       echo " sum = $sum";
   }
   $count++;
}
echo "the decimal value is".$sum."\n";
if($count1 ==1)
{
    echo "swapped number is even \n";
}
else
{
    echo "swapped number is odd \n";
}
}
play();
?>