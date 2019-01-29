<?php
// requires the below .php file to work
require 'SinglyLinkedList.php';

/**
 * Custom data structure queue with its popular method implemented on linked list
 */
class LinkedListStack
{
/*
 * list to store the element and implement linked list
 */
    public $list;

    /**
     * Constructor function to initialize the list 
     */    
    public function __construct()
    {
        // internaly creating and using SinglyLinkedList
        $this->list = new SinglyLinkedList();
    }


    /**
     * function to push data at the end of the list
     * @param item the item to be pushed
     */
    public function push($item)
    {
        // internaly calling append function of SinglyLinkedList
        $this->list->append($item);
    }

    public function pop()
    {
        // internaly calling append function of SinglyLinkedList

        if($this->list->is_empty())
        {
            echo "stack is empty\n";
        }
        else
        {
            return $this->list->pop();
        }
    }

    //  to check the size
    public function size()
    {
        return $this->list->size_of_list();
    }
    
    // to check if the list is empty
    public function isEmpty()
    {
       return $this->list->is_empty();
    }


    //  to get the array of data from the list
    public function getArray()
    {
        return $this->list->array();
    }

}
?>