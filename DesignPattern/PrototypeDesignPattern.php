<?php
/**
 *Program to create Prototype Design Pattern
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

/**
 *Creating SubObject class with clone function to clone objects
 */
class SubObject
{
    static $instances = 0; //static instance variable is intialised with 0
    public $instance; //public instance variable

    //creating no argument construct
    public function __construct()
    {
        $this->instance = ++self::$instances; //incrementing the static value by one and assigning that to instance variable
    }
    /**
     * Magic function clone to clone the attributes or properties of the object
     */
    public function __clone()
    {
        $this->instance = ++self::$instances; //incrementing the static value by one and assigning that to instance variable
    }
}
/**
 *Creating MyCloneable class with clone function to clone objects
 */
class MyCloneable
{
    public $firstObject; //public instance variable
    public $secondObject; //public instance variable
    public function __clone()
    {
        // Force a copy of this->object, otherwise it will point to same object.
        $this->firstObject = clone $this->firstObject;
    }
}

//try catch
try {
    echo ("\n----------PROTOTYPE DESIGN PATTERN------------\n");
    echo ("---------BEGIN TESTING PROTOTYPE PATTERN----------\n");
    echo ("\n");

    //creating MyCloneable object for testing clone
    $obj = new MyCloneable();

    //creating SubObject class's object in instance variable of obj
    $obj->firstObject = new SubObject();
    $obj->secondObject = new SubObject();

    //cloning the obj to new obj
    $secObj = clone $obj;

    //pringing the original object
    print("Original Object:\n");
    print_r($obj);

    //printing the clonead object
    print("Cloned Object:\n");
    print_r($secObj);

} catch (Exception $e) {
    echo "\n", $e->getMessage();
} finally {
    echo ("------------END TESTING PROTOTYPE PATTERN----------------\n");
    echo ("\n");
}
