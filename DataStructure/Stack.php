<?php
class Stack
{
    public static $max = 1000;
    public $top = -1;
    public  $arr = null;

    public function __construct()
    { 
        $this->arr = new SplFixedArray(Stack::$max);
        $this->top = -1; 
    } 

    public function push($data)
    {
        if($this->top > (Stack::$max-1))
        {
            echo "stack overflow\n";
        }
        else
        {
            $this->arr[++$this->top] = $data;
            echo "$data pushed into stack\n";
        }
    }

    public function pop()
    {
        if($this->top<0)
        {
            return -1; //stack underflow
        }
        else
        {
            $x = $this->arr[$this->top--];
            return $x;
        }
    }

    public function peek()
    {
        if($this->top<0)
        {
            return -1; //stack underflow
        }
        else
        {
            $x = $this->arr[$this->top];
            return $x;
        }
    }

    public function isEmpty()
    {
        if($this->top < 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function size()
    {
        if($this->top < 0)
        {
            return 0;
        }
        else
        {
            return ($this->top+1);
        }
    }
}
?>