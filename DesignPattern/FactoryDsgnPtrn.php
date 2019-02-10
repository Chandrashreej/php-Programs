<?php
/**
 *Program to create Factory Design Pattern to create a
 *Computer Factory that can Produce PC, Laptop and Server Class Computers
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

/**
 *Creating an abstract class with abstract methods and one concrete method
 */
abstract class Computer
{

    abstract public function getRAM(); //function to get RAM value  of things which is type compatible to computer
    abstract public function getHDD(); //function to get HDD value  of things which is type compatible to computer
    abstract public function getCPU(); //function to get CPU value  of things which is type compatible to computer

    /**
     *Creating function toString to get all the data of that particular class
     *@param nothing
     *@return stringvalue is returned
     */
    public function toString()
    {

        return "RAM = " . $this->getRAM() . ", HDD=" . $this->getHDD() . ", CPU=" . $this->getCPU();

    }
}
/**
 *Creating an PC class that extends Computer abstract class
 */
class PC extends Computer
{

    private $ram; //private instance variable
    private $hdd; //private instance variable
    private $cpu; //private instance variable

    /**
     *Creating an parameterised constructor to assign values for pc
     */
    public function __construct($ram, $hdd, $cpu)
    {
        $this->ram = $ram;
        $this->hdd = $hdd;
        $this->cpu = $cpu;
    }
    /**
     *Creating function getRAM to get the data of that particular class
     *@param nothing
     *@return ram value is returned
     */
    public function getRAM()
    {
        return $this->ram;
    }
    /**
     *Creating function getHDD to get the data of that particular class
     *@param nothing
     *@return hdd value is returned
     */
    public function getHDD()
    {
        return $this->hdd;
    }
    /**
     *Creating function getCPU to get the data of that particular class
     *@param nothing
     *@return cpu value is returned
     */
    public function getCPU()
    {
        return $this->cpu;
    }

}
/**
 *Creating an PC class that extends Computer abstract class
 */
class Server extends Computer
{

    private $ram; //private instance variable
    private $hdd; //private instance variable
    private $cpu; //private instance variable
    /**
     *Creating an parameterised constructor to assign values for Server
     */
    public function __construct($ram, $hdd, $cpu)
    {
        $this->ram = $ram;
        $this->hdd = $hdd;
        $this->cpu = $cpu;
    }
    /**
     *Creating function getRAM to get the data of that particular class
     *@param nothing
     *@return ram value is returned
     */
    public function getRAM()
    {
        return $this->ram;
    }
    /**
     *Creating function getHDD to get the data of that particular class
     *@param nothing
     *@return hdd value is returned
     */
    public function getHDD()
    {
        return $this->hdd;
    }
    /**
     *Creating function getCPU to get the data of that particular class
     *@param nothing
     *@return cpu value is returned
     */
    public function getCPU()
    {
        return $this->cpu;
    }

}
/**
 *Creating an PC class that extends Computer abstract class
 */
class Laptop extends Computer
{

    private $ram; //private instance variable
    private $hdd; //private instance variable
    private $cpu; //private instance variable
    /**
     *Creating an parameterised constructor to assign values for Laptop
     */
    public function __construct($ram, $hdd, $cpu)
    {
        $this->ram = $ram;
        $this->hdd = $hdd;
        $this->cpu = $cpu;
    }
    /**
     *Creating function getRAM to get the data of that particular class
     *@param nothing
     *@return ram value is returned
     */
    public function getRAM()
    {
        return $this->ram;
    }
    /**
     *Creating function getHDD to get the data of that particular class
     *@param nothing
     *@return hdd value is returned
     */
    public function getHDD()
    {
        return $this->hdd;
    }
    /**
     *Creating function getCPU to get the data of that particular class
     *@param nothing
     *@return cpu value is returned
     */
    public function getCPU()
    {
        return $this->cpu;
    }

}
/**
 *Creating an PC class that extends Computer abstract class
 */
class ComputerFactory
{
    /**
     *Creating function toString to get all the data of that particular class
     *@param type to get the particular type of computer
     *@param ram is the random access memory for that particular type of computer
     *@param hdd is the hard disk memory for that particular type of computer
     *@param cpu is the clock rate refers to frequency at which cpu runs
     *@return object of that particular type or null is returned
     */
    public static function getComputer($type, $ram, $hdd, $cpu)
    {
        // if and elseif loop
        if (strcasecmp("PC", $type)) {

            //if the type is matched to pc
            return new PC($ram, $hdd, $cpu);

        } else if (strcasecmp("Server", $type)) {

            //if the type is matched to Server
            return new Server($ram, $hdd, $cpu);

        } else if (strcasecmp("Laptop", $type)) {

            //if the type is matched to Laptop
            return new Laptop($ram, $hdd, $cpu);

        }

        return null; //else returns null
    }

}
