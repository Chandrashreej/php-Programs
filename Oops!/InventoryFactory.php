<?php

/**
 * program to Create InventoryManager to manage the Inventory.
 * The Inventory Manager will use InventoryFactory to create Inventory Object from JSON.
 * The InventoryManager will call each Inventory Object in its list to
 * calculate the Inventory Price and then call the Inventory Object to return the JSON String.
 * The main program will be with InventoryManager
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

// requires below .php file to work on
require "Utilioops.php";

// creating InventoryFactory class
class InventoryFactory
{
    public $invObjArr = array();
    public $myInvObj;

    /**
     *Creating paramaterised constructor
     * @param ask for myJSONobj
     * @return returns nothing
     */
    public function __construct($myJSONobj)
    {

        //calling Utilioops class read_JSON_File function
        $this->myInvObj = Utilioops::read_JSON_File($myJSONobj);
    }

    /**
     *Creating function to getInvObjectValues
     * @param accept nothing
     * @return returns myInvObj
     */
    public function getInvObjectValues()
    {
        return $this->myInvObj;
    }

    /**
     *Creating function to setListOfInvObj
     * @param accept for array
     * @return returns nothing
     */
    public function setListOfInvObj($array)
    {
        //azining the accepted value to invObjArr
        $this->invObjArr = $array;
    }

    /**
     *Creating function to getListOfInvObj
     * @param nothing
     * @return returns invObjArr
     */
    public function getListOfInvObj()
    {
        return $this->invObjArr;
    }

    /**
     *Creating static function to convert php Object back to JSON string
     * @param nothing
     * @return returns JSON string
     */
    public function convToJSON()
    {
        $myJSON = json_encode($this->myInvObj); //json_encode converts php object to string
        return $myJSON; // returning JSON string
    }
}
