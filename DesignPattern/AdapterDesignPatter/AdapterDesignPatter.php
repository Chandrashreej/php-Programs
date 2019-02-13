<?php
/**
 *Program to create Adapter Design Pattern
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

/********************************************************************************************/

/**
 *Creating an volt class for getting and setting volt
 */
class Volt
{

    private $volts; //instance variable

    public function __construct($v)
    {
        $this->volts = $v;
    }
    /**
     *Creating function getVolts to get required volt
     *@param nothing
     *@return currentVoltage
     */
    public function getVolts()
    {
        return $this->volts;
    }
    /**
     *Creating function setVolts to set the voltage of volt class
     *@param currentVoltage
     *@return nothing
     */
    public function setVolts($volts)
    {
        $this->volts = $volts;
    }

}
/********************************************************************************************/

/**
 *Creating an socket class
 */
class Socket
{
    /**
     *Creating function getVolts to get required volt
     *@param nothing
     *@return voltage of 240 volt
     */
    public function getVolt()
    {
        return new Volt(240);
    }
}
/********************************************************************************************/
/**
 *Creating an SocketAdapter interface with get 120volt, get12volt and get3volt functions
 */
interface SocketAdapter
{

    public function get120Volt(); // abstract function get120Volt

    public function get12Volt(); // abstract function get12Volt

    public function get3Volt(); // abstract function get3Volt
}
/**************************************************************************************************************************/

/**
 *Creating an SocketClassAdapterImpl class that implements SocketAdapter interface and extends socket class
 */

class SocketClassAdapterImpl extends Socket implements SocketAdapter
{
    /**
     *Creating function getVolts to get required volt
     *@param nothing
     *@return voltage of 120 volt
     */
    public function get120Volt()
    {
        //calling function getvolt of socket class and copying that value
        $v = $this->getVolt();
        //passing that value to convertvolt of same class
        return $this->convertVolt($v, 2);
    }
    /**
     *Creating function getVolts to get required volt
     *@param nothing
     *@return voltage of 12 volt
     */
    public function get12Volt()
    {
        //calling function getvolt of socket class and copying that value
        $v = $this->getVolt();
        //passing that value to convertvolt of same class
        return $this->convertVolt($v, 20);
    }
    /**
     *Creating function getVolts to get required volt
     *@param nothing
     *@return voltage of 3 volt
     */
    public function get3Volt()
    {
        //calling function getvolt of socket class and copying that value
        $v = $this->getVolt();
        //passing that value to convertvolt of same class
        return $this->convertVolt($v, 80);
    }
    /**
     *Creating function getVolts to get required volt
     *@param v voltage
     *@param i for dividing voltage to get exact value
     *@return voltage of 120 volt
     */
    private function convertVolt($v, $i)
    {
        //calling function getvolt of socket class and calculating the required voltage and returning
        return new Volt($v->getVolts() / $i);
    }

}
