<?php

    //requires function in the file Node.php
    require_once "Node.php";
/*
 * Custiom daata structure queue with its popular method implemented on linked list
 */
class SinglyLinkedList 
{
    // list contains first last and size
   public $first=null;
   public $last=null;
   public $size=0;
    /*
     * Constructor function to initialize the list 
     */
    public function __construct()
    {
        $this->first =null;
        $this->last =null;
    }
    /**
     * function to push data at the starting of the list
     * @param item the item to be pushed
     */
    public function add($data)
    {
        // checking if the list is empty
        if($this->is_empty())
        {
            // creating new node with given data
            $n = new Node($data, null);
            $this->first =$n;
            $this->last =$n;
            
        }
        else
        {
            //searching the list if the data is present
           if($this->search_of_list($data))
            {
                echo "element found in the list\n"; 
            }
            else
            {
                // creating new node with given data
                $newnode = new Node($data,null);
                $curr = $this->first;
                $newnode->next= $curr;
                $this->first =$newnode;
                
            }
        }
    }
    // getting the data as string of all the data present in the lisrt
    public function getString()
    {
        $s = "";
        $n = $this->first;
        while ($n != null) {
            $s .= $n->data." ";
            $n = $n->next;
        }
        $s = substr($s,0,-1);
        return $s;
    }
    /*
     * function to push data at the required place depending on the data
     * @param item the item to be pushed
     */
    public function add_Of_Ordered_data($data)
    {
        // checking if and else condition
        if (!$this->first) 
           {
            //    creating new node
                $node = new Node($data, null);
                $this->first = $node;
                $this->last = $node;
                $this->size++;
           } 
        else 
           {
            //    if else condition is not satisfied
                if ($data < $this->first->data) 
                {
                    // creating new node
                $node = new Node($data,$this->first);
                $this->first = $node;
                $this->size++;
                return;
                }
                // creating tempoirary pointer
                $current = $this->first;
                while ($current) 
                {
                    // looping untill current become null
                    if ($current->data < $data && isset($current->next) && $current->next->data > $data) 
                    {
                        // if the data is btw the correct position it comes to this loop
                        $node = new Node($data,$current->next);
                        $current->next = $node;
                        $this->size++;
                    }
                    if ($current->data < $data && !isset($current->next)) 
                    {
                        // if the data is btw the correct position it comes to this loop
                        $node = new Node($data,$current->next);
                        $current->next = $node;
                        $this->size++;
                    }
                    // moving current to next value
                  $current = $current->next;

                }
            }
    }
    // function to print the data 
    public function printing_data()
    {
        // creating tempo node and ponting to first
        $curr = $this->first;
        while($curr)
        {
            // looping untill current become null
            echo $curr->data." ";
            $curr=$curr->next;
        }

    }
    /**
     * Function to check if the list is empty or not
     * @return boolean true of false
     */
    public function is_empty()
    {
        // if first element is null returns true else false
        if($this->first == null)
        {
            return true;
        }
        else
        {
            return false;
        }

    }
    /**
     * Function to check the size of list
     * @return size the size of the list
     */   
    public function size_of_list()
    {
        $count =0;
        // creating tempo node
        $temp = $this->first;
        while($temp != null)
        {
            // looping till temp become null
            $count++;
            $temp = $temp->next;
        }
        return $count;
    }
    /**
     * Function to search the iteam in the list
     *  @return boolean true of false
     */    
    public function search_of_list($search)
    {
        if($this->first == null)
        {
            return false;
        }
        // creating tempo node
            $temp = $this->first;
            while($temp != null)
            {
                // looping till temp become null
                if($temp->data==$search)
                {
                    return true;
                }
                else
                {
                    $temp =$temp->next;
                }
            }
            return false;
        
    }
     /**
     * Function to remove the item from the list
     */
    public function remove_node($data)
    {
         
    // creating 2 tempo node
    $current = $this->first;
    $previous = $this->first;

    while($current->data != $data)
    {
        // looping untill it finds the exact match of data and removes the data
        if($current->next == NULL)
            return false;
        else
        {
            $previous = $current;
            $current = $current->next;
        }
    }

    if($current == $this->first)
     {
          if($this->size == 1)
           {
              $this->last = $this->first;
           }
           $this->first = $this->first->next;
           return true;
    }
    else
    {
        if($this->last == $current)
        {
             $this->last = $previous;
        }
        $previous->next = $current->next;
        return true;
    }
    $this->size--; 
    }
    /**
     * Function to add the data in the list at last
     *  @return boolean true of false
     */ 
    public function append($item)
    {
        // checking if list is empty
        if($this->is_empty() == true)
        {
            $this->first = new Node($item,null);
            $this->last =$this->first;
            $this->size++;
            return true;
        }
        elseif($this->search_of_list($item))
        {
            // searching if list has that iteam
            return false;
        }
        else
        {
            $newnode = new Node($item,null);
            $this->last->next =$newnode;
            $this->last = $newnode;
            $this->size++;
            return true;
        }

    }

    /**
     * Function to add the data in the list at given position
     *  @return boolean true of false
     */ 
    public function insert_At_Pos($pos,$item)
    {
        // taking 2 temporary nodes
        $prev=$this->first;
        $curr =$this->first;
        $newnode =new Node($item, null);
        $count=-1;
        // looping untill current become null
        while($curr !=null)
        {
            $count++;
            // if and else condition checking for position
            if($count ==$pos && $count ==0)
            {
                $newnode->next = $curr;
                $this->first = $newnode;
                return true;
                break;
            }
            elseif($count ==$pos)
            {
                $newnode->next = $curr;
                $prev->next = $newnode;
                return true;
            }
            $prev = $curr;
            $curr =$curr->next;
        }
        if($curr == null && $pos == $count+1)
        {
            $prev->next =$newnode;
            $last = $newnode;
            return true;
        }
        else
        {
            echo "given pos is not found in list itself...";
            return false;
        }
    }
    /**
     * Function to remove the data in the list at given position
     *  @return the removed data
     */
    public function popPos($pos)
    {
        if($this->size==0)
        {
            echo "list is empty\n";
            return null;
        }
        // taking temporary node
        $temp = $this->first;
        $current = $this->first;
        $count = -1;
            
        // looping untill current become null
        
        while($current!=null)
        {
            $count++;
                    
            // if and else condition checking for data content

            if($count == $pos && $count == 0)
            {
                $this->first = $current->next;
                $tdata = $current->data;
                $current->next = null;
                return $tdata;
            }
            else if($count == $pos && $current == $this->last)
            {
                $tdata = $current->data;
                $this->last = $temp;
                $temp->next = null;
                return $tdata;
            }
            else if($count==$pos)
            {
                $tdata = $current->data;
                $temp->next = $current->next;
                $current->next = null;
                return $tdata;
            }
            $temp = $current;
            $current = $current->next;
        }
        echo "given position is not found in list\n";
        return null;
    }

    /**
     * Function to remove the data from last in the list
     *  @return the removed data
     */
    public function pop()
    {
        // if and else condition checking for data content
        if($this->first == null)
        {
            echo "list is empty\n";
            return null;
        }
        if($this->first == $this->last)
        {
            // taking temporary node
          $temp = $this->first->data;
          $this->first =  $this->last = null;
          return $temp;
        }
        else
        {
            $temp = $this->first;
            $current = $this->first;
            // looping untill current become null
            while($current->next != null)
            {
                $temp = $current;
                $current = $current->next;
            }
            $tdata = $current->data;
            $this->last = $temp;
            $temp->next = null;
            return $tdata;
        }
    }

    /**
     * Function to list the data 
     *  @return the list of data as a string
     */    
    public function listing_of_data()
    {
        $str = "";
        $curr = $this->first;
        while($curr)
        {
            $str =$str.$curr->data." ";
            $curr=$curr->next;
        }
        return $str;
        
    }

    /**
     * Function to get the position of the given data 
     *  @return the position if present else returns -1
     */     
    public function index($data)
    {
        if($this->size==0)
        {
            echo "list is empty\n";
            return -1;
        }
        $temp = $this->first;
        $count = -1;
        while($temp!=null)
        {
            $count++;
            if($temp->data == $data)
            {
                return $count;
            }
            else
            {
                $temp = $temp->next;
            }
        }
        echo "item not found\n";
        return -1;
    }

    /**
     * Function to get the array of data present in the list 
     *  @return the array
     */      
    public function array()
    {
        $arr = array();
        $i = 0;
        $curr = $this->first;
        while($curr)
        {
            // looping till the current become null
            $arr[$i++] = $curr->data;
            $curr=$curr->next;
        }
        return $arr;
    }



}
?>