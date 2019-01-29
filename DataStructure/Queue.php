<?php 
// creating element class that is used by queue
class Element{
  public $value;
  public $next;
}
/**
 * Custom data structure queue with its popular method implemented on linked list
 */
class Queue
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


}
// $queue = new Queue();
// $queue->enqueue("start"); 
// $queue->enqueue(1);
// $queue->enqueue(2);
// $queue->enqueue(3);
// $queue->enqueue(4);
// $queue->enqueue("End");
// echo $queue->size();
// // while(!$queue->isEmpty()){
// //   echo $queue->dequeue()."\n";
// // }
// echo $queue->size();

// $queue->enqueue("stop"); 
// $queue->enqueue(11);
// $queue->enqueue(22);
// $queue->enqueue(32);
// $queue->enqueue(423);
// $queue->enqueue("Endede");
// echo $queue->size();
// while(!$queue->isEmpty()){
//   echo $queue->dequeue()."\n";
// }
// echo $queue->size();
?>