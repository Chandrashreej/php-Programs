<?php
class Util
{
/*********************************Validating float value***************************************/
    public static function validating_float($num)
    {
        if(is_numeric($num) && strpos($num, '.') )  //calling is_numeric() and strpos() to validate 
        {
        return true;
        }
        else
        {
        return false;
        }

    }
/*********************************Validating String value***************************************/
    public static function validating_str($num)
    {
        if( is_numeric($num)) //calling is_int() and is_float() to validate 
        {
            return false;
        }
        else
        {
            return true;
        }

    }
/*********************************Taking string input from user***************************************/
    public static function taking_string_input()
    {
        fscanf(STDIN, "%s\n", $txt); // accepting input from user
        while(! (Util::validating_str($txt) )) //calling validating_str() method from util class to validate 
        {
            echo "Warning:Enter the string containing char and no digits in it:\n";
            fscanf(STDIN, "%s\n", $txt);
        }
        return $txt;
        
    }
/*********************************Taking number input from user***************************************/
    public static function taking_num_input()
    {
        fscanf(STDIN, "%d\n",$num); // accepting input from user
        while((Util::validating_float($num))) //calling validating_float() method from util class to validate 
        {
            echo "Warning :the num should not be decimal and it should not contain char\n";
            fscanf(STDIN, "%d\n",$num);

        }
        return $num;
    }
/*********************************Anagram***************************************/
    public static function anagram_detection($str, $anstr)
    {

        $count =0;
        if(strlen($str) != strlen($anstr) )
        {
            echo " The strings are not anagram! \n";
        }
        else
        {
            for ($i =0;$i< strlen($anstr);$i++)
            {
                for ($j =0;$j< strlen($str);$j++)
                {
                    if($anstr[$i] ==$str[$j])  
                    {
                        $count++;
                    }
                }
            }
            if($count == strlen($anstr))
            {
                echo " The strings are anagram! \n";
            }
            else
            {
               echo " The strings are not anagram! \n";
            }
        }
    }


/*********************************Binary sort for String***************************************/
    public static function binary_sort_for_str()
    {
        echo "Enter your first string: \n";
        $str =  Util::taking_string_input();

    }
/*********************************Binary sort for Number***************************************/
public static function binary_sort_for_num()
{
    echo "Enter num: \n";
    $str =  Util::taking_num_input();

}



/*********************************Insertion sort for String***************************************/
    public static function insertion_sort_for_str($arr,$num)
    {
        for($i =1 ;$i <$num ;$i++)
        {
            for($j =$i ;$j > 0 ;$j--)
            {
                if($arr[$j-1] > $arr[$j])
                {
                    $temp = $arr[$j -1];
                    $arr[$j-1] = $arr[$j];
                    $arr[$j] = $temp;
                }
            
            }

        }
        echo "printing the sorted array : [ ";
        for($k =0; $k < sizeof($arr) ;$k++)
        {
        echo  $arr[$k]." ";
        }
        echo "]\n";

    
        
    }


/*********************************Insertion sort for Number***************************************/
    public static function insertion_sort_for_num($arr, $num)
    {


        for($i =1 ;$i <$num ;$i++)
        {
            for($j =$i ;$j > 0 ;$j--)
            {
                if($arr[$j-1] > $arr[$j])
                {
                    $temp = $arr[$j -1];
                    $arr[$j-1] = $arr[$j];
                    $arr[$j] = $temp;
                }
            
            }

        }
        echo "printing the sorted array : [ ";
        for($k =0; $k < sizeof($arr) ;$k++)
        {
        echo  $arr[$k]." ";
        }
        echo "]\n";


    }
/*********************************Bubble sort for String***************************************/
    public static function bubble_sort_for_str($arr, $num)
    {

        for($i =1 ;$i < $num ;$i++)
        {
            for($j = 1 ;$j < $num  ;$j++)
            {
                if($arr[$j-1] > $arr[$j])
                {
                    $temp = $arr[$j -1];
                    $arr[$j-1] = $arr[$j];
                    $arr[$j] = $temp;
                }
            
            }

        }
        echo "printing the sorted array : [ ";
        for($k =0; $k < sizeof($arr) ;$k++)
        {
        echo  $arr[$k]." ";
        }
        echo "]\n";
   
    }

/*********************************Bubble sort for Number***************************************/
    public static function bubble_sort_for_num($arr, $num)
    {

        for($i =1 ;$i < $num ;$i++)
        {
            for($j = 1 ;$j < ($num) ;$j++)
            {
                if($arr[$j-1] > $arr[$j])
                {
                    $temp = $arr[$j -1];
                    $arr[$j-1] = $arr[$j];
                    $arr[$j] = $temp;
                }
            
            }

        }
        echo "printing the sorted array : [ ";
        for($k =0; $k < sizeof($arr) ;$k++)
        {
        echo  $arr[$k]." ";
        }
        echo "]\n";
    }
/*********************************Vending Machine***************************************/
    public static function vending_machine_rs_generator($amount ,$i, $notes)
    {
        $arr =array(1000,500,100,50,10,5,2,1);
        if($amount == 0 && $i == count($arr))
        {
            echo "total number of notes = ".$notes."\n";
            return;
        }
        if(floor($amount / $arr[$i])>0)
        {
            //echo $arr[$i]."notes is".floor($amount/$arr[$i]);
            $notes =$notes + floor($amount/$arr[$i]);
            $amount = $amount % $arr[$i];
            Util::vending_machine_rs_generator($amount ,$i+1, $notes);
            return;
        }
        Util::vending_machine_rs_generator($amount ,$i+1, $notes);
        

    }
/*********************************Day of Week ***************************************/

    public static function day_of_week_cal($d, $m, $y)
    {
        $y1 = floor($y - (14 - $m) / 12)+1;
        //echo $y1. " ";
        $x = floor($y1 + ($y1/4)- ($y1/100) + ($y1/400)) ;
        //echo $x. " ";
        $m1 = ($m +12 * floor(((14 - $m) / 12)) - 2 );
        //echo $m1. " ";
        $d1 = floor(($d + $x +floor(( 31 * $m1) / 12)) % 7 );
       // echo $d1. " ";
        $day =array("sunday","monday","tuesday","wednesday","thursday","friday","saturday");
        echo $d1."\n";
       echo "The day is ".$day[$d1]."\n";
    
    }
/*********************************Monthly Payment***************************************/
    public static function monthly_payment($P, $Y,$R)
    {
        $n = 12* $Y;
        $r =$R /(12*100);

        $payment = ($P * $r)/((1-pow((1+$r),-$n)));
        echo "$payment you would have to make over $Y years to pay off a $P principal loan amount at $R per cent interest compounded monthly. ";
    }
/*********************************Decimal to Binary***************************************/

    public static function decimal_to_binary($num)  
    {
        $arr =array();
         $i = 0; 
        while ($num > 0)  
        { 
            // storing remainder in binary array 
            $arrs[$i] = $num  % 2; 
            $num = $num / 2; 
            $num=explode(".",$num);
            $num=$num[0];
            $i++; 
        } 
        return $arr;

    //     // $number = $num;
    //     // $num = decbin($num);
    //     // $str = "".$num;
    //    // echo " hey";
    //     while($num >0)
    //     {   $r = $num % 2;
    //         //echo $r ." ";
    //         $str = $str + $r;
    //         //cho $str ." ";
    //         $num = ($num/2);
    //         //echo $num ." ";
    //     }
    //     // if(strlen($str) < 8)
    //     // {
    //     //     $str = "0"+$str;
    //     // }
        while(count($arr) < 8)
        {
            $str="0".$str;
        }
            return $str;
    }
/*********************************Binary to Decimal and vise verse***************************************/
    public static function binary_to_decimal($num)
    {
        $binvalue = Util::decimal_to_binary($num);
        echo " The binary number is $binvalue";
        $mid = strlen($binvalue)/2;
        $sum =0;
        $count = 0;
        $count1 = 0;
        $string ="";
        
        for($index =$mid ;$index <strlen($binvalue);$index++)
        {
            $string= $string.$binvalue[$index];
            echo "in 2nd loop :".$string."\n ";
        }
        for($index =0 ;$index <$mid;$index++)
        {
            $string= $string.$binvalue[$index];
            echo "in 1nd loop :".$string."\n ";
        }
        ECHO " Swapped binary is ".$string ."\n";
        
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
/*********************************Elapsed time***************************************/
    public static function elapsed_time()
    {
        $start = 0;
        $stop =0;
        $arr = array(1000, 900, 800, 600, 500, 400, 300, 200, 100);
            
        echo "Insertion sort for Number\n";
        $start =Util::stop_watch();
        (Util::insertion_sort_for_num($arr, 9));
        $stop =Util::stop_watch();
        echo "the elapsed time for Insertion sort for Number is ".($stop -$start)."\n";

        echo "\n";

        echo "Bubble sort for Number\n";
        $start =Util::stop_watch();
       (Util::bubble_sort_for_num($arr, 9));
        $stop =Util::stop_watch();
        echo "the elapsed time for Insertion sort for Number is ".($stop -$start)."\n";

        echo "\n";

        $arr = array("chandra", "wokly","facinate","alori","xyz", "pqr", "klm", "ghi", "abc");

        echo "Insertion sort for String\n";
        $start =Util::stop_watch();
         (Util::insertion_sort_for_str($arr, 9));
        $stop =Util::stop_watch();
        echo "the elapsed time for Insertion sort for String is ".($stop -$start)."\n";
        
        echo "\n";

        echo "Bubble sort for Number\n";
        $start =Util::stop_watch();
         (Util::bubble_sort_for_str($arr, 9));
        $stop =Util::stop_watch();
        echo "the elapsed time for Insertion sort for Number is ".($stop -$start)."\n";
    
    }
 /*********************************Stop Watch***************************************/

    
    public static function stop_watch()
    {
       // $num =1000000;
        $time =microtime(true);  
        //$time =($time*$num);
        return $time;
    }
}
?>