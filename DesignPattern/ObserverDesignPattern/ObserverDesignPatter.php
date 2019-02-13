<?php
/**
 *Program to create Observer Design Pattern
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

/********************************************************************************************/

//creating class that implements SplSubject which is built in interface and implement attach, detach and notify functions of SplSubject
class Subject implements SplSubject
{

    public $state; //public instance variable for the object Subject
    private $observers; // private instance variable for the object Subject

    //creating an constructor to assign observer
    public function __construct()
    {
        $this->observers = new SplObjectStorage; //SplObjectStorage class provides a map from objects to data
    }
    /**
     *Creating function attach
     *@param {object reference} {$observer} {to get attached}
     *@return void
     */
    public function attach(SplObserver $observer)
    {
        echo "Subject: Attached an observer.\n";
        $this->observers->attach($observer);
    }
    /**
     *Creating function detach
     *@param observer of type SplObserver
     *@return void
     */
    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
        echo "Subject: Detached an observer.\n";
    }
    /**
     *Creating function notify
     *@param nothing
     *@return void
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
     *@return void
     */
    public function someBusinessLogic()
    {
        echo "\nSubject: I'm doing something important.\n";
        $this->state = rand(0, 10); //getting a random values

        echo "Subject: My state has just changed to: ".$this->state."\n";
        $this->notify(); //notifying the observer
    }
}
//creating class ConcreteObserverA that implements SplObserver which is built in interface and implement updatefunctions of SplObserver
class ConcreteObserverA implements SplObserver
{
    /**
     *Creating function update
     *@param subject of splsubject type
     *@return void
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
     *@return void
     */
    public function update(SplSubject $subject)
    {
        //if the value of the state is equal to 0 and greater or equal to 2 this loop is worked
        if ($subject->state == 0 || $subject->state >= 2) {
            echo "ConcreteObserverB: Reacted to the event.\n";
        }
    }
}
