<?php

// requires the below file to work on it
require ("LinkedListStack.php");

class Utilds
{
    /*****************************************Taking_Num_Input*************************************************/

    // creating the funct to take input from user and returns number
    public static function taking_Num_Input()
    {
        fscanf(STDIN, "%s\n",$num);
        // validating untill the user gives correct information
        while((Utilds::validating_Float($num)))
        {
            echo "Warning :the num should not be decimal and it should not contain char\n";
            fscanf(STDIN, "%s\n",$num);

        }
        return $num;
    }

/*****************************************Taking_String_Input*************************************************/

    // creating the funct to take input from user and returns string
    public static function taking_string_input()
    {
        fscanf(STDIN, "%s\n", $txt);
        // validating untill the user gives correct information
        while( is_numeric($txt) )
        {
            echo "Warning:Enter the string with no digits in it:\n";
            fscanf(STDIN, "%s\n", $txt);
        }
        return $txt;
        
    }


/*****************************************Validating_Float*************************************************/

    // creating the funct to validate float which returns boolean
    public static function validating_Float($num)
    {
        //  checking wheather the passed num is numeric with check
        if(is_numeric($num) && strpos($num, '.') )
        {
           return true;
        }
        else
        {
           return false;
        }
  
    }

/*****************************************Validating_String*************************************************/

    // creating the funct to validate string which returns boolean
    public static function validating_str($num)
    {
        //  checking wheather the passed num is int and float
        if(is_int($num) || is_float($num))
        {
           return false;
        }
        else
        {
           return true;
        }
  
    }
/*****************************************Validating_is_Prime*************************************************/

    // creating the funct to validate the num is prime
    public static function is_Prime($n)
    {
        // looping till half of num
        for ($i = 2; $i <= $n / 2; $i++) 
        {
            if ($n % $i == 0)
            {
                return false;
            }
        }
        return true ;
    }

/*****************************************Get_prime_Range*************************************************/

    // creating the funct to get prime num from the given range 
    public static function get_prime($range)
    {
        // creating empty array 
        $prime = [];
    
        $count = 0;
        for ($i = 2; $i < $range; $i++) 
        {
            // looping from 2 to given range

            // calling is prime func of utilds class
            if (Utilds::is_Prime($i)) 
            {
                $prime[$count++] = $i;
            }
        }
        return $prime; //returning the array of prime numbers
    }

/*****************************************Day_of_week_cal*************************************************/
   
    // creating func which accepts day month and year and returns which day it is present
    public static function day_of_week_cal($d, $m, $y)
    {
        $y1 = floor($y - (14 - $m) / 12)+1;

        $x = floor($y1 + floor($y1/4) - floor($y1/100) + floor($y1/400)) ;

        $m1 = ($m +12 * floor(((14 - $m) / 12)) - 2 );

        $d1 = floor(($d + $x +floor(( 31 * $m1) / 12)) % 7 );
        return $d1;
    }


/*****************************************Checking Leap Year*************************************************/
    
    // creating func which accepts year checks wheather the year is leap year or not and returns boolean
    public static function checkingleapyear($year)
    {
        if(($year %4 ==0) && (($year % 100 == 0) || ($year % 400==0)))
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }

/*****************************************Checking is anagram*************************************************/

    // creating func which accepts 2 vars  and check wheather the given vars are anagarm and return boolean
    public static function is_Anagram($str1,$str2)
    {
        // spliting the give data so that u will get array
        $arr1 = str_split($str1,1);
        $arr2 = str_split($str2,1);

        // checking for the size of both array if not return false 
        if(count($arr1)!=count($arr2))
        {
            return false ;
        }

        // looping over array to search the data 
        for($i = 0 ; $i < count($arr1);$i++)
        {
            if(array_search($arr1[$i],$arr2)!==false)
            {
                $key = array_search($arr1[$i],$arr2);
                unset($arr2[$key]);
            }
            
        }

        // checking if the size of array is 0 using if and else
        // returns boolean
        if(count($arr2)==0)
        {
            return true ;
        }
        else
        {
            return false ;
        }
    }

/*****************************************Prime 2 D Array*************************************************/
    // prints the 2 D array of Prime numbers
    public static function TwoDArray($arr)
    {
        $count=0;
        $count1=0;
        // creating 2 Dimensional array
        $arr2D = array(array());
        $index = 0;
        // $n is 100 because of first row should contain 0 t0 100 and second should contain 100 to 200 and so on
        $n = 100;
        for ($i=0; $i < 10; $i++) 
        { 
            // creating array for each row
            $iArr = array();
   
            for ($j=0; $j < 100; $j++) 
            { 
                // loops untill the value at particular index becomes greater than the $n value
                if ($index == sizeof($arr) || $arr[$index]>$n )
                {
                    break; // goes out of the if loop
                }
                $x = $arr[$index++];
                $iArr[$j] = $x;
                // calculating length of the digits so that it should assign correctly
                $count1 = strlen($x);
                if($count1>$count)
                {
                    $count = $count1;
                }
            }
            // increasing for every row
            $n += 100;
            // pushing the data to the array
            array_push($arr2D,$iArr);
        }
        // incrementing count to +1 and the end 
        $count = $count+1;

        // to print the data
        for ($row=0; $row < count($arr2D); $row++) 
        { 
            // looping for getting rows
            for ($col=0; $col < count($arr2D[$row]); $col++)
            { 
                // looping for getting columns
                echo $arr2D[$row][$col];
                $x = $count-strlen($arr2D[$row][$col]);
                for($y=0;$y<$x;$y++)
                {
                    echo " ";
                }
            }
            echo "\n";
        }
    }
/**********************Prime 2D array and 2D array for anagrams and non anagrams******************************/
    // func is anagram 
    public static function isAnagram($str1, $str2) 
    { 
        // Counts the num of occurrences of every byte value in that string
        // returns boolean
        if (count_chars($str1, 1) == count_chars($str2, 1)) 
        {
            return true;  
        }
        else 
        {
            return false;
        }
                    
    } 
    // func prints prime which anagaram in one 2D array and non anagram in another 2D array
    public static function prime_Anagram($arr)
    {
        $l = count($arr);
        $anagram = false;
        // creating 2 array for anagram and non anagram
        $ananArr = [];
        $nonAnanArr = [];
        for($x=0;$x<$l;$x++)
        {
            for($y=0;$y<$l;$y++)
            {
              if($x != $y)
              {
                //   calling is anagram 
                $anagram =  Utilds::isAnagram($arr[$x],$arr[$y]);
                if($anagram)
                {
                    // calling array_pushfunc of array to push the data
                    array_push($ananArr,$arr[$x]);
                    break; 
                }
              }
            }
            // if the var is not anagaram it is pushed to another array
            if(!$anagram)
            {
                // pushing the data to the array
                array_push($nonAnanArr,$arr[$x]);
            }
        }
        echo "\n";
        echo "anagrams\n";
        // calling 2D array to print the data
        Utilds::TwoDArray($ananArr);
        echo "\n";

        // calling 2D array to print the data
        echo "non-anagrams\n";
        Utilds::TwoDArray($nonAnanArr);
        echo "\n";

    }
/*****************************************Stack Anagram*************************************************/

    public static function stack_Anagram($arr)
    {
        $l = count($arr);
        $anagram = false;
        $stack = new LinkedListStack();
        for($x=0;$x<$l;$x++)
        {
            // looping till the end of the array
            for($y=0;$y<$l;$y++)
            {
                // looping till the end of the array
                if($x != $y)
                {
                    // calling is anagram 
                    $anagram = Utilds::isAnagram($arr[$x],$arr[$y]);
                    if($anagram)
                    {
                        // pushing the element 
                        $stack->push($arr[$x]); 
                    }
                }
            }
        }
        echo "prime anagrams in reverse order is\n";
        // getting the array from thr stack
        $arr1 = $stack->getArray();
        for($x=count($arr1)-1;$x>=0;$x--)
        {
            echo $arr1[$x]." ";
        }
    }
/*****************************************for Calender*************************************************/
    // func to calculate end date 
    public static function calculateEnd($month, $year)
    {
        // if and else for checking on which month it falls 
        if ($month < 8) 
        {
            if ($month % 2 == 0) 
            {
                if ($month == 2) 
                {
                    // calling checkingleapyear funct to check wheather the year is leap year or not
                    if (Utilds::checkingleapyear($year)) 
                    {
                        return 29;
                    }
                    return 28;
                }
                return 30;
            } else 
            {
                return 31;
            }
        } 
        else 
        {
            if ($month % 2 == 0) 
            {
                return 31;
            }
            return 30;
        }
    }
    
    // func to print the calender
    public static function printCal($arr)
    {
        echo "Sun   Mon   Tue   Wed   Thu   Fri   Sat\n";
        for ($i = 0; $i < 6; $i++) 
        {
            // looping till the end
            for ($j = 0; $j < 7; $j++) 
            {
                // looping till the end
                if ($arr[$i][$j] == '-' || $arr[$i][$j] > 31) 
                {
                    echo "      ";
                } else 
                {
                    if ($arr[$i][$j] < 10) 
                    {
                        echo $arr[$i][$j] . "     ";
                    } else 
                    {
                        echo $arr[$i][$j] . "    ";
                    }
                }
            }
            echo "\n";
        }
    }
    
    // func to fill the array
    // returns the array
    public static function arrayFill($start, $arr, $end)
    {
        $count = 1;
        for ($i = $start; $i < 7; $i++) {
            $arr[0][$i] = $count++;
        }
        for ($i = 1; $i < 6; $i++) {
            for ($j = 0; $j < 7 && $count <= $end; $j++) {
                $arr[$i][$j] = $count++;
            }
        }
        return $arr;
    }
    
    // func to create and initialize the array with '-' 
    // this returns array
    public static function initArray()
    {
        $arr = [];
        for ($i = 0; $i < 6; $i++) 
        {
            $aa = array();
            for ($j = 0; $j < 7; $j++) 
            {
                $aa[$j] = '-';
            }
            array_push($arr, $aa);
        }
        return $arr;
    }
}
?>