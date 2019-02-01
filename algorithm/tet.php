<?php
    include 'Util.php';
    function insertion_sort_for_num()
    {
        echo "Enter the length of array: \n";
        $num =  Util::taking_num_input();
        $z =0;
        while($num == 0)
        {
           echo "Enter the length greater than 0: \n";
            $num =  Util::taking_num_input();
        }
        $arr = array();
        while($num != sizeof($arr))
        {
            echo "Enter the values for array: \n";
            $txt =  Util::taking_string_input();
            $arr[$z]=$txt;
            $z++;
        }

        for($i =1 ;$i < $num ;$i++)
        {
            for($j = 1 ;$j < ($num-1) ;$j++)
            {
                if($arr[$j-1] > $arr[$j])
                {
                    $temp = $arr[$j -1];
                    $arr[$j-1] = $arr[$j];
                    $arr[$j] = $temp;
                }
            
            }

        }
        echo "printing the sorted array : ";
        for($k =0; $k < sizeof($arr) ;$k++)
        {
        echo  $arr[$k]." ";
        }

    }
    insertion_sort_for_num();
        // $number = $num;
        // $num = decbin($num);
        // $str = "".$num;
       // echo " hey";
        while($num >0)
        {   $r = $num % 2;
            //echo $r ." ";
            $str = $str + $r;
            //cho $str ." ";
            $num = ($num/2);
            //echo $num ." ";
        }
        // if(strlen($str) < 8)
        // {
        //     $str = "0"+$str;
        // }
?>