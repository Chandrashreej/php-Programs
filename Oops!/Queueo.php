<?php 

// creating element class that is used by queue
require_once ('Element.php');
/**
 * Custom data structure queue with its popular method implemented on linked list
 */
class Queueo
{ 

  private $front = null;
  private $back = null;
  private $size = null; 
  /**
  * Constructor function to initialize the queue 
  */  
  public function __construct()
  {
      $this->front = null;
      $this->back = null;
      $this->size = null;

  }

  public function isEmpty()
  {
    return $this->front == null;
  }
  
    /**
     * function to push data at the end of the queue
     * @param $value the item to be pushed
     */
  public function enqueue($value){
     $oldback = $this->back;
     $this->back = new Element(); 
     $this->back->value = $value;
     if($this->isEmpty())
     {
       $this->front = $this->back;
       $this->size++; 
     }
     else
     {
       $oldback->next = $this->back;
       $this->size++; 
     }

  }
   /**
    * Function to remove the item from the start of the list
    */
  public function dequeue()
  {
    if($this->isEmpty()){
      echo "the queue is empty\n";
      return null; 
    }
    $removedValue = $this->front->value;
    $this->front = $this->front->next;
    $this->size--;
    return $removedValue;
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
  * Function to get the array of data present in the list 
  * @return the array
  */      
  public function getArray()
  {
    $arr = array();
    $i = 0;
    $curr = $this->front;
    while($curr)
    {
      // looping till the current become null
      $arr[$i++] = $curr->value;
      $curr=$curr->next;
    }
    return $arr;
    
  }
  public function getData()
  {
    $temp = $this->front;
    $str = "";
    while($temp)
    {
        $str = $str.$temp->value;
        if($temp->next!=null)
        {
            $str = $str." ";
        }
        $temp = $temp->next;
    }
    return $str;
  }


}

?>