<?php
/**
 * Program which creates Banking Cash Counter where people come in to deposit Cash and withdraw Cash. 
 * Have an input panel to add people to Queue to either deposit or withdraw money and dequeue the people.
 * Maintain the Cash Balance.
 *
 * @author chandrashree j
 * @since 09-01-2019
 */
 //requires function in the file Queue.php and Utility.php
 require ('Queue.php');
 require ('Utilds.php');

 class Banking
 {
    public $cashbalance;
    public $list;
    // creating no arg constructor
   public function __construct()
   {
        //initializing a queue to store the data
       $this->list = new Queue();
       $this->cashbalance=10000;
   }
    // function cash deposit    
    public function cash_Deposit($amount)
    {
       $cash = $this->cashbalance+$amount;
        $this->list->enqueue($cash);
    }

    // function cash withdraw  

    public function cash_Withdraw($amount)
    {
        $cash = $this->cashbalance-$amount;
        $this->list->enqueue($cash);
    }
 // function to add person to queue  
    public function que_Clear()
    {
        $pplQue = new Queue();
        // taking user input
        echo "enter the number of people in  queue\n";
        $ppl = Utilds::taking_Num_Input();
        //looping to give input in queue 
        for($i=1;$i<=$ppl;$i++)
        {
            $pplQue->enqueue($i);
        }
        return $pplQue;
    }


    public function process($pplQue)
    {
        try {
         // looping to get ppl from queue untill queue become empty
        for($j=0; !$pplQue->isEmpty();$j++)
        {
            $x = $pplQue->dequeue();
 
                echo "press 1 for amount deposition 2 for amount withdrawl and 3 for exit\n";
                // taking user input
                $num = Utilds::taking_Num_Input();
                while($num <=3 )
                {
                           /*
                            * switch function for cash withdrawal or amount deposition
                            */
                    switch($num)
                    {
                        case 1:
                        
                            echo "Amount deposition\n";
                            echo "enter the amount to be transacted\n";
                            // taking user input
                            $amount = Utilds::taking_Num_Input();
                            $this->cash_Deposit($amount);
                            // get input from queue 
                            $transactionAmount =$this->list->dequeue();

                            echo "amount deposited is $amount\n";
                            echo "total amount is $transactionAmount\n";
                           
                            
                        
                        break ;
                        case 2 :
                        
                            echo "enter the amount to be transacted\n";
                            // taking user input
                            $amount = Utilds::taking_Num_Input();
                            // calling cash_Withdraw function 
                            $this->cash_Withdraw($amount);
                            //if else condition 
                            if($amount >0 )
                            { 
                                echo "Amount withdraw\n";
                                if($this->cashbalance < $amount) 
                                {
                                    // if the amount selected by acccount holder is more than balance  for withdraw
                                    echo "their is no sufficient amount to perform withdrawal of $amount\n";
                                    echo "available balance  is $this->cashbalance\n";
                                    echo "Thank you for your transaction...\n";
                                }
                                else
                                {

                                    // get input from queue by calling dequeue function 
                                    $transactionAmount =$this->list->dequeue();
                                    echo "Total amount is $transactionAmount\n";
                                    echo "Thank you for your transaction...\n";

                                   
                                }
                            }
                            else
                            {
                                echo "invalid transaction amount cant withdraw\n";
                                // when user has given invalid amount transaction
                            }
                        
                        break;
                        case 3 :
                        
                            echo "Thank you\n";
                        
                        break;
                        default:
                            // when user has given invalid number
                            echo "Invalid selection of number\n";
                        
                        break;
                    }
                }
        
        }
    } catch (Exception $e) {
        echo "\n", $e->getMessage();
    }
    }
    
}

//creating banking object
$counter = new Banking();
//calling counter function
$pplQue =$counter->que_Clear();
$counter->process($pplQue);
?>