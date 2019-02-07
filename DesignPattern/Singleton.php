<?php
/**
 *Program to create Singleton Design Pattern
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

/**
 *Creating Singleton class
 */
class ChocolateSingleton
{
    private $name = 'Diary Milk Silk Roasted Almond'; //creating private field intializer
    private $price = 10; //creating private field intializer
    private static $chocolate = null; //creating private static intializer
    private static $isGivenOut = false; //creating private static intializer

    /**
     *Creating empty no argument constructor
     *@param nothing
     *@return nothing
     */
    private function __construct()
    {

    }

    /**
     *Creating function borrowChocolate is the only getinstance method in this class(i.e,lazy initialisation)
     *@param nothing
     *@return chcolate or null
     */
    public static function borrowChocolate()
    {
        if (false == self::$isGivenOut) {
            if (null == self::$chocolate) {
                self::$chocolate = new ChocolateSingleton();
            }
            self::$isGivenOut = true;
            return self::$chocolate;
        } else {
            return null;
        }
    }

    /**
     *Creating function returnChocolate is to set static variable false
     *@param nothing
     *@return nothing
     */
    public function returnChocolate()
    {
        self::$isGivenOut = false;
    }

    /**
     *Creating function getName is to get chocolate name
     *@param nothing
     *@return name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *Creating function getPrice is to get chocolate price
     *@param nothing
     *@return name
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     *Creating function getNameAndPrice is to get chocolate name and chocolate price
     *@param nothing
     *@return nameWithPrice of chocolate
     */
    public function getNameAndPrice()
    {
        return ($this->getName() . ' of price ' . $this->getPrice());
    }
}

/**
 *Creating ChocolateBorrower class
 */
class ChocolateBorrower
{
    private $borrowedChocolate; //creating private field intializer
    private $haveChocolate = false; //creating private field intializer is intialized with false

    /**
     *Creating empty no argument constructor so that other classes cannot create object
     *@param nothing
     *@return nothing
     */
    public function __construct()
    {
    }

    /**
     *Creating function getNameAndPrice is to get chocolate name and chocolate price
     *@param nothing
     *@return nameWithPrice of chocolate
     */
    public function getNameAndPrice()
    {
        //if and else condition to check if the object is used by some other
        if (true == $this->haveChocolate) {
            return $this->borrowedChocolate->getNameAndPrice();
        } else {
            return "Sorry I don't have the chocolate \n";
        }
    }
    /**
     *Creating function borrowChocolate is to get the singleton object
     *@param nothing
     *@return nothing
     */
    public function borrowChocolate()
    {
        $this->borrowedChocolate = ChocolateSingleton::borrowChocolate();
        if ($this->borrowedChocolate == null) {
            $this->haveChocolate = false;
        } else {
            $this->haveChocolate = true;
        }
    }

    /**
     *Creating function returnChocolate to use singleton object again
     *@param nothing
     *@return nothing
     */
    public function returnChocolate()
    {
        $this->borrowedChocolate->returnChocolate($this->borrowedChocolate);
    }
}

/**
 * Initialization
 */
echo ("\n----------SINGLETON DESIGN PATTERN------------\n");
echo ("---------BEGIN TESTING SINGLETON PATTERN----------\n");
echo ("\n");

//creating new ChocolateBorrower object
$firstChocolateBorrower = new ChocolateBorrower();

//creating new ChocolateBorrower object
$secondChocolateBorrower = new ChocolateBorrower();

//calling borrowChocolate using ChocolateBorrower object
$firstChocolateBorrower->borrowChocolate();
echo ("\nfirstChocolateBorrower asked to borrow the chocolate\n");
echo ("firstChocolateBorrower Name and price of chocolate if he have: ");
//calling getNameAndPrice using ChocolateBorrower object
echo ($firstChocolateBorrower->getNameAndPrice());
echo ("\n");
echo ("\n");
//calling borrowChocolate using ChocolateBorrower object
$secondChocolateBorrower->borrowChocolate();
echo ("secondChocolateBorrower asked to borrow the book\n");
echo ("secondChocolateBorrower Name and price of chocolate if he have: ");

//calling getNameAndPrice using ChocolateBorrower object
echo ($secondChocolateBorrower->getNameAndPrice());
echo ("\n");
//calling returnChocolate using ChocolateBorrower object
$firstChocolateBorrower->returnChocolate();
echo ("firstChocolateBorrower returned the Chocolate\n");
echo ("\n");

//calling borrowChocolate using ChocolateBorrower object
$secondChocolateBorrower->borrowChocolate();
echo ("secondChocolateBorrower Name and price of chocolate if he have: ");

//calling getNameAndPrice using ChocolateBorrower object
echo ($firstChocolateBorrower->getNameAndPrice());
echo ("\n");

echo ("------------END TESTING SINGLETON PATTERN----------------\n");
echo ("\n");
