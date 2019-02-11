<?php
/**
 *Program to create Observer Design Pattern
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

/********************************************************************************************/
/**
 * error handler to handle errors
 */
set_error_handler(function ($errno, $errstr, $error_file, $error_line) {
    echo "______Error Occured_____handle it\n";
    echo "Error: [$errno] $errstr - $error_file:$error_line \n";
    die();
});

//creating class that implements SplSubject which is built in interface and implement attach, detach and notify functions of SplSubject
class Subject implements SplSubject
{

    public $state; //public instance variable
    private $observers; // private instance variable

    //creating an constructor to assign observer
    public function __construct()
    {
        $this->observers = new SplObjectStorage; //SplObjectStorage class provides a map from objects to data
    }
    /**
     *Creating function attach
     *@param observer of type SplObserver
     *@return nothing
     */
    public function attach(SplObserver $observer)
    {
        echo "Subject: Attached an observer.\n";
        $this->observers->attach($observer);
    }
    /**
     *Creating function detach
     *@param observer of type SplObserver
     *@return nothing
     */
    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
        echo "Subject: Detached an observer.\n";
    }
    /**
     *Creating function notify
     *@param nothing
     *@return nothing
     */
    public function notify()
    {
        echo "Subject: Notifying observers...\n";
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
    /**
     *Creating function someBusinessLogic
     *@param nothing
     *@return nothing
     */
    public function someBusinessLogic()
    {
        echo "\nSubject: I'm doing something important.\n";
        $this->state = rand(0, 10); //getting a random values

        echo "Subject: My state has just changed to: {$this->state}\n";
        $this->notify(); //notifying the observer
    }
}
//creating class ConcreteObserverA that implements SplObserver which is built in interface and implement updatefunctions of SplObserver
class ConcreteObserverA implements SplObserver
{
    /**
     *Creating function update
     *@param subject of splsubject type
     *@return nothing
     */
    public function update(SplSubject $subject)
    {
        //if the value of the state is less than 3 this loop is worked
        if ($subject->state < 3) {
            echo "ConcreteObserverA: Reacted to the event.\n";
        }
    }
}
//creating class ConcreteObserverB that implements SplObserver which is built in interface and implement update functions of SplObserver
class ConcreteObserverB implements SplObserver
{
    /**
     *Creating function update
     *@param subject of splsubject type
     *@return nothing
     */
    public function update(SplSubject $subject)
    {
        //if the value of the state is equal to 0 and greater or equal to 2 this loop is worked
        if ($subject->state == 0 || $subject->state >= 2) {
            echo "ConcreteObserverB: Reacted to the event.\n";
        }
    }
}
//try catch finally block if exception happen
try {
    echo ("\n----------OBSERVER DESIGN PATTERN------------\n");
    echo ("---------BEGIN TESTING OBSERVER PATTERN----------\n");
    //creating new subject class object
    $subject = new Subject;

    //creating new ConcreteObserverA class object
    $o1 = new ConcreteObserverA;
    $subject->attach($o1); //calling attach function on Subject object

    //creating new ConcreteObserverB class object
    $o2 = new ConcreteObserverB;
    $subject->attach($o2); //calling attach function on Subject object

    $subject->someBusinessLogic(); //calling someBusinessLogic function on Subject object
    $subject->someBusinessLogic(); //calling someBusinessLogic function on Subject object

    $subject->detach($o2); //calling detach function on Subject object

    $subject->someBusinessLogic(); //calling someBusinessLogic function on Subject object

} catch (Exception $e) {
    echo "\n", $e->getMessage();
} finally {
    echo ("------------END TESTING OBSERVER PATTERN----------------\n");
    echo ("\n");
}
