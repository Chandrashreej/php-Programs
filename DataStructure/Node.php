<?php

class Node
{    
    public $data;
    public $next;
    /**
     * Constructor function to initialize the list 
     */
    function __construct($data,$next)
    {
        $this->data = $data;
        $this->next = $next;
    }


}

?>