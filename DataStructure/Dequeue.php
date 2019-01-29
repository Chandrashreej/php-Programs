<?php

/**
 * Custiom daata structure dequeue with its popular method implemented on linked list
 */
class Dequeue
{
    public $front = null;
    public $rear = null;
    public $arr = null;
    public $size = 0;
    /**
     * Constructor function to initialize the list 
     */
    public function __construct()
    {
        $this->front = -1;
        $this->rear = -1;
        $this->arr = array();
        $this->size = 0;
    }
    /**
     * function to push data at the start of the queue
     * @param item the item to be pushed
     */
    public function addFront($item)
    {
        if($this->front==-1 && $this->rear==-1)
        {
            $this->arr[++$this->front] = $item;
            $this->rear = $this->front;
            $this->size++;
        }
        else
        {
            $this->front = $this->front-1;
            $this->arr[$this->front] = $item;
            $this->size++;
        }
    }
    /**
     * function to push data at the end of the queue
     * @param item the item to be pushed
     */
    public function addRear($item)
    {
        if($this->front==-1 && $this->rear==-1)
        {
            $this->arr[++$this->rear] = $item;
            $this->front = $this->rear;
            $this->size++;
        }
        else
        {
            $this->rear = $this->rear+1;
            $this->arr[$this->rear] = $item;
            $this->size++;
        }
    }
    /**
     * Function to remove the item from the start of the list
     */
    public function removeFront()
    {
        if($this->front==$this->rear)
        {
            $item = $this->arr[$this->front];
            $this->front = $this->rear = -1;
            $this->size--;
        }
        else
        {
            $item = $this->arr[$this->front];
            $this->front = $this->front+1;
            $this->size--;
        }
        return $item;
    }
    /**
     * Function to remove the item from the end of the list
     */
    public function removeRear()
    {
        if($this->rear==$this->front)
        {
            $item = $this->arr[$this->rear];
            $this->rear = $this->front = -1;
            $this->size--;
        }
        else
        {
            $item = $this->arr[$this->rear];
            $this->rear = $this->rear-1;
            $this->size--;
        }
        return $item;
    }
    /**
     * Function to check the size of queue
     * @return size the size of the queue
     */
    public function size()
    {
        return $this->size;
    }
    /**
     * Function to check if the queue is empty or not
     * @return boolean true of false
     */
    public function isEmpty()
    {
        return $this->size==0;
    }
}
?>