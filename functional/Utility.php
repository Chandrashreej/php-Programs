<?php
class Utility
{
    public static function takingstringinput()
    {
        fscanf(STDIN, "%s\n", $txt);
        while((! (strlen($txt)>= 3)) || is_numeric($txt) )
        {
            echo "Warning:Enter the string of min 3 char and no digits in it:\n";
            fscanf(STDIN, "%s\n", $txt);
        }
        return $txt;
        
    }
    public static function replacingstring ()
    {
        $txt1 ="Hello <<UserName>>, How are you?\n";
        $txt2 = "<<UserName>>";
        echo "enter the string :\n";
        $txt = Utility::takingstringinput();
        $str = str_replace($txt2, $txt, $txt1);
        echo $str;
    }
    public function takingnuminput()
    {
        fscanf(STDIN, "%s\n",$num);
        while((Utility::validating_float($num)))
        {
            echo "Warning :the num should not be decimal and it should not contain char\n";
            fscanf(STDIN, "%s\n",$num);

        }
        return $num;
    }
    public function taking_num_input()
    {
        fscanf(STDIN, "%s\n",$num);
        while(!(is_numeric($num)))
        {
            echo "Warning :the num should not contain char\n";
            fscanf(STDIN, "%s\n",$num);

        }
        return $num;
    }
    public static function validating_float($num)
    {
        if(is_numeric($num) && strpos($num, '.') )
        {
           return true;
        }
        else
        {
           return false;
        }
  
    }
    public static function validating_str($num)
    {
        if(is_int($num) || is_float($num))
        {
           return false;
        }
        else
        {
           return true;
        }
  
    }
    public static function flip_coin_validation()
    {
        echo "enter a number greater than 0\n";
        $number =  Utility::takingnuminput();
        while(!($number >0 || is_numeric($number)))
        {
            echo "Warning: enter a number greater than 0\n";
            $number =  Utility::takingnuminput();
        }
        return $number;
    }

    public static function flipingcoin()
    {
        $number =Utility::flip_coin_validation();
        $tailcount=0;
        $headcount=0;
        for($i=0 ;$i<=$number;$i++ )
        {
            $num=rand(0,1);
            if($number<0.5)
            {
                ++$tailcount;
            }
            else
            {
                ++$headcount;
            }
        }
        echo "headcount $headcount\n";
        echo "tail count $tailcount\n";
        $percenthead =(int)($headcount/($headcount+$tailcount));
        $percenttail =(int)($tailcount/($headcount+$tailcount));
        echo "percentage of heads : ".$percenthead;
        echo " (vs) percentage of tail : ".$percenttail."\n";
    }
    public static function checkingleapyear()
    {
        echo "enter the year to check if it is leap year or not it and it should contain only four digits\n";
        $year = Utility::takingnuminput();
        while(!(strlen($year) == 4))
        {
            echo "year should contain 4 digits:\n";
           $year = Utility::takingnuminput();
        }
        if(($year %4 ==0) && (($year % 100 == 0) || ($year % 400==0)))
        {
            echo "This is leap year\n ";
        }
        else
        {
            echo "This is not leap year\n ";
        }
        

    }
    public static function power_rising()
    {
        echo "enter a number btw 0 and 31 only: \n";
        $num =  Utility::takingnuminput();
        if($num >=0)
        {
            echo "2 ^ 0 = 1"; 
            echo "\n";
        }
        while(($num >=0) && ( $num >=31 ))
        {
            echo "Warning :the num should be btw 0 and 31 only \n";
            $num =  Utility::takingnuminput();
        }
        $power =1;
        for($j =1 ; $j <= $num ; $j++)
        {
            $power *=2;
            echo "2 ^ ".$j." = ".$power;
            echo "\n";
        }
    }
    public static function printing_harmonic_value()
    {
        echo "enter a number greater than 0 :\n";
        $num =  Utility::takingnuminput();
        while($num ==0)
        {
            echo "Warning :the num should not be zero.\n";
            $num =  Utility::takingnuminput();
        }
        $harmonic=0.00;
        $str="";
        for($i =1; $i<=$num;$i++)
        {
            $str = $str."+(1/".$i. ")";
            $harmonic =$harmonic +(float)(1/$i);
        }
        echo $str." = ".$harmonic. "\n";
        //echo "harmonic".$harmonic;
    }
    public static function printing_prime_factor()
    {
        echo "enter a number greater than 0 :\n";
        $num =Utility::takingnuminput();
        $str = "";
        while(!($num>2))
        {
            echo "Warning :the num should not be zero\n";
            $num =Utility::takingnuminput();      
        }
        if(!(Utility::prime_num($num)))
        {
            echo "it is a prime number and prime factor is $num\n";
        }
         else
        {
           echo "prime factor is : \n";
            while($num%2 ==0)
            {
                echo "2 \n";
                $num= $num/2;
            }
            for ($i = 3; $i*$i <= $num; $i +=2)
            {
                while($num % $i == 0)
                {
                    echo $i. ", \n";
                    $num= $num/$i;

                }
            }
            if($num>2 )
            {
                echo  $num. "\n";
            }
            
        }

    }
    public static function prime_num($num)
    {
        for($i =2; $i<=($num/2); $i++)
        {
            if($num % $i ==0)
            {
                return true;
            } 
        }
        return false;

    }
    public static function gambler_player()
    {
        echo "enter the take\n";
        $take =  Utility::takingnuminput();
        echo "enter the Goal ,condition: goal should be more than take\n";
        $goal =  Utility::takingnuminput();
        echo "enter the number of times you should play ,condition : it should not be equal to zero\n";
        //fscanf(STDIN, "%d\n",$num);
        $numft =  Utility::takingnuminput();
        $win =0;
        $loss =0;
        while($take> $goal)
        {
            echo "Warning : goal should be more than take.\n";
            $take =  Utility::takingnuminput();
            $goal =  Utility::takingnuminput();
        }
        while($numft ==0)
        {
            echo "Warning :the num should not be zero.\n";
            $numft =Utility::takingnuminput();      
        }
        while($take > 0 && $take < $goal && $numft > 0)
        {
            //$num = ;
            
            if((mt_rand(0*10 , 1*10)/10) >0.5)
            {
                ++$win;
                ++$take;
            }
            else            {
                ++$loss;
                --$take;
            }
            --$numft;
        } 
        $percentwin =(int)(($win*100)/($win +$loss));
        $percentloss =(int)(($loss*100)/($win +$loss));
        echo "no of times win is $win\n";
        echo "no of times loss is $loss\n";
       
        echo "percent of win is $percentwin\n";
        echo "percent of loss is $percentloss\n";

    }
    public static function coupon_generator()
    {
        echo "enter the number of times to generate coupon :\n";
        $num =  Utility::takingnuminput();
        while($num==0)
        {
            echo "Warning :the num should not be zero.\n";
            $num =Utility::takingnuminput();      
        }
        $couparr =array();
        $i=1;
        $couparr[0] =(mt_rand(1*10 ,10*10));
        $count =1;

        while((sizeof($couparr)) != $num)
        {
            $rdnum=(mt_rand(1*10 ,10*10));
            $count++;
            if(array_search($rdnum,$couparr)==false)
                  {
                $couparr[$i] =$rdnum;
                $i++;
            }
        }
        for($z =0 ;$z < count($couparr); $z++)
        {
            echo $couparr[$z]." ";
        }
        echo "\n total number of coupons generated : ".$count."\n";
    }
    public $count =0;
    public $count1 =0;
    public static function calling_2Darray($row, $column)
    {
        $count1=0;
        $arr=array(array());
        for($i=0;$i< $row; $i++)
        {
            for($j =0; $j<$column ; $j++)
            {
                echo "enter the number :\n";
                $num =  Utility::taking_num_input();
                $arr[$i][$j]= $num;
                $count =strlen($arr[$i][$j]);
                if($count1<$count)
                {
                    $count1 = $count;
                }
            }

        }
        $count = $count1+1;
        for($i=0;$i< $row; $i++)
        {
            for($j =0; $j<$column ; $j++)
            {
                echo $arr[$i][$j];
                $print = $count1-strlen($arr[$i][$j]);
                for($m = 0;$m <$print;$m++)
                {
                echo " ";
                }
            }
            echo "\n";

        }
    }


    // public static function printing_2Darray($arr,$row,$column)
    // {
   
    //     for($i=0;$i< $row; $i++)
    //     {
    //         echo " [ ";
    //         for($j =0; $j<$column ; $j++)
    //         {
    //          echo $arr[$i][$j]."  ";
    //         }
    //         echo "] \n ";

    //     }

    // }
    public static function sum_of_3_ints()
    {
        $arr= array();
        $count =0;
        echo "enter the size of array:\n";
        $number =  Utility::takingnuminput();
       for($x =0; $x< $number ;$x++)
        {
        echo "enter the number:\n";
        $num =  Utility::takingnuminput();
        $arr[$x]=$num;
        }
        for($i=0;$i< count($arr); $i++)
        {
            for($j =$i+1;$j< count($arr) ; $j++)
            {
                for($k =$j+1; $k< count($arr) ; $k++)
                {
                   if(($arr[$i] + $arr[$j] + $arr[$k]) == 0)
                   {
                       ++$count;
                        echo "the sum of 3 which is equal to zero :  ".$arr[$i]."+".$arr[$j]."+".$arr[$k]." =0 \n";
                   }

                }
            }
        }
        echo "the number of triplets found is $count \n";


    }
    public static function distance_calculation()
    {
        echo "enter the x value :\n";
        $x =  Utility::takingnuminput();
        echo "enter the y value :\n";
        $y=  Utility::takingnuminput();

        $p=(($x*$x)+($y*$y));
        $distance =sqrt($p);
        echo "the distance between x and point y is $distance  \n";

    }
    public static function string_permutation($str,$l,$r)
    {
        if ($l == $r) 
        echo $str. "\n"; 
        else
        { 
            for ($i = $l; $i <= $r; ++$i) 
            { 
                $str = swap($str, $l, $i); 
                permute($str, $l + 1, $r); 
                $str = swap($str, $l, $i); 
            } 
        } 

    }
    public static function swap_string($a, $i, $j)
    {
        $temp =$a[$i];
        $a [$i]= $a[$j];
        $a[$j]=$temp;
        return $a;
    }
    public static function elapsed_time_using_stopwatch()
    {
        $bool =true;
        while($bool)
        {
        echo "enter 1 to start and 0 to stop :\n";
        $num =  Utility::takingnuminput();
        while($num != '0' && $num != '1')
        {
            echo "Warning :enter a valid input\n";
            $num =  Utility::takingnuminput();
        }
        if($num =='1')
        {
         $bool =true;
         $start = time();
        }  
        elseif($num =='0')
        {
            $bool = false;
            $stop = time();
        }
        }
        echo "the time elapsed is ".($stop-$start)."\n";
    }
    public static function quadratic_equation()
    {
        echo "enter the a value : ";
        $a =  Utility::takingnuminput();
        echo "enter the b value : ";
        $b=  Utility::takingnuminput();
        echo "enter the c value : ";
        $c =  Utility::takingnuminput();
        if($a==0)
        {
            echo "not a quadratic equation \n";
        }
        else
        {

            $delta = $b*$b - 4*$a*$c;
            if($delta >0)
            {
                $Rootx1 = (-$b + sqrt($delta))/(2*$a);
                $Rootx2 = (-$b - sqrt($delta))/(2*$a);
                echo "the roots of quadratic equation are $Rootx1 and $Rootx2 \n";
            }
            elseif($delta == 0)
            {
                $Rootx1 = (-$b + sqrt($delta))/(2*$a);
                echo "the root of quadratic equation are $Rootx1 \n";
            }
            else
            {
                $Rootx1 = ((-$b )/(2*$a));
                $Rootx2 = (sqrt(-$delta))/(2*$a);
                echo "the first complex root of quadratic equation are ".$Rootx1. " +i" .$Rootx2."\n";  
                echo "the second complex root of quadratic equation are ".$Rootx1. " -i".$Rootx2 ."\n"; 
            }
        }
    }
    public static function wind_chilling()
    {
        echo "enter the temperature which is greater than 50 : ";
        $temp =  Utility::takingnuminput();
        while($temp <50)
        {
            echo "Warning :Invalid temperature, it should be greater than 50 \n";
            $temp =  Utility::takingnuminput();
        }
        echo "enter the velocity which is less than 3 or greater than 120 : ";
        $velocity =  Utility::takingnuminput();
        while($velocity >3 && $velocity <120)
        {
            echo "Warning :Invalid velocity which is less than 3 or greater than 120 \n";
            $velocity =  Utility::takingnuminput();
        }
        
        $windchil = (35.75 +( 0.6215 *$temp )) +((0.4275 * $temp - 35.75 )* (pow($velocity,0.16)));
        echo "the wind chill for temperature $temp in fahrenheit and velocity $velocity in miles/ hour is $windchil \n";
    }

}
?>