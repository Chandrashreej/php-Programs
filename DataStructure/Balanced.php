<?php

/**
*Program where parentheses are used to order the performance of operations. 
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

//  requires Utilds.php and Stack.php
require 'Stack.php'; 
require 'Utilds.php'; 
 
function balanced_Paranthesis()
{
    // creating stack object
        $stack = new Stack();

        $str = "";
        echo "enter the arithmetic expression\n";
        // calling taking_string_input from Utilds
        $str = Utilds::taking_string_input();

        // loop overing till the end of string length
        for($x=0;$x<strlen($str);$x++)
        {
            $ch = $str[$x];
            if($ch == '(')
            {
                // adding '(' to the stack
                $stack->push($ch);
            }
            else if($ch == ')')
            {
                // removing '(' to the stack
                $stack->pop();
            }
        }
        if($stack->isEmpty())
        {
            echo "balanced\n";
        }
        else
        {
            echo "not balanced\n";
        }
    }
    // calling the balanced_Paranthesis function 
    balanced_Paranthesis();
?>