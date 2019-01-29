
<?php  
// PHP program for insertion sort 
require 'Util.php';
// Function to sort an array 
// using insertion sort 
function insertionSort() 
{ 
    // $arr = array(12, 11, 13, 5, 6); 
    // $n = sizeof($arr); 
    echo "Enter the length of array: \n";
    $n =  Util::taking_num_input();
    $i =0;
    // while($num == 0)
    // {
    //     echo "Enter the length greater than 0: \n";
    //     $num =  Util::taking_num_input();
    // }
    $arr = array();
    while($n != sizeof($arr))
    {
        echo "Enter the values for array: \n";
        $number =  Util::taking_num_input();
        $arr[$i]=$number;
        $i++;
    }
    for ($i = 1; $i < $n; $i++) 
    { 
        $key = $arr[$i]; 
        $j = $i-1; 
      
        // Move elements of arr[0..i-1], 
        // that are    greater than key, to  
        // one position ahead of their  
        // current position 
        while ($j >= 0 && $arr[$j] > $key) 
        { 
            $arr[$j + 1] = $arr[$j]; 
            $j = $j - 1; 
        } 
          
        $arr[$j + 1] = $key; 
    }
    { 
        for ($i = 0; $i < $n; $i++) 
            echo $arr[$i]." "; 
        echo "\n"; 
    }  
} 
  
// A utility function to 
// print an array of size n 
//function printArray(&$arr, $n) 
// { 
//     for ($i = 0; $i < $n; $i++) 
//         echo $arr[$i]." "; 
//     echo "\n"; 
// } 
  
// Driver Code 
// $arr = array(12, 11, 13, 5, 6); 
// $n = sizeof($arr); 
 insertionSort(); 
// //printArray($arr, $n); 
  
// This code is contributed by ChitraNayal. 
?> 
