<?php
/**
 *Program to create Visitor Design Pattern
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
//creating ItemElement interface so that different type of items (Elements) to be used in shopping cart
interface ItemElement
{
    //creating abstract function accept that has to be implemented by the concrete class
    public function accept(ShoppingCartVisitor $visitor);
}

//Book class that implements ItemElement interface and has to implement abstract function accept
class Book implements ItemElement
{

    private $price; // private instance variable for the object Book
    private $isbnNumber; // private instance variable for the object Book

    //creating paramaterised constructor function
    public function __construct($cost, $isbn)
    {
        //assigning the instance variables using constructor
        $this->price = $cost;
        $this->isbnNumber = $isbn;
    }
    /**
     *Creating function getPrice to get the price of object
     *@param void
     *@return price of that particular object
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     *Creating function getIsbnNumber to get the IsbnNumber of object
     *@param void
     *@return isbnNumber of that particular object
     */
    public function getIsbnNumber()
    {
        return $this->isbnNumber;
    }
    /**
     *implementing function accept of the interface
     *@param  visitor of ShoppingCartVisitor interface
     *@return current,class of that particular object
     */
    public function accept(ShoppingCartVisitor $visitor)
    {
        return $visitor->visit($this);
    }

}
//Fruit class that implements ItemElement interface and has to implement abstract function accept
class Fruit implements ItemElement
{

    private $pricePerKg; // private instance variable for the object Fruit
    private $weight; // private instance variable for the object Fruit
    private $name; // private instance variable for the object Fruit

    //creating paramaterised constructor function
    public function __construct($priceKg, $wt, $nm)
    {
        //assigning the instance variables using constructor
        $this->pricePerKg = $priceKg;
        $this->weight = $wt;
        $this->name = $nm;
    }
    /**
     *Creating function getPricePerKg to get the Price Per Kg of object
     *@param void
     *@return Price of that particular object
     */
    public function getPricePerKg()
    {
        return $this->pricePerKg;
    }
    /**
     *Creating function getWeight to get the Weight of object
     *@param void
     *@return Weight of that particular object
     */
    public function getWeight()
    {
        return $this->weight;
    }
    /**
     *Creating function getName to get the Name of object
     *@param void
     *@return Name of that particular object
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     *implementing function accept of the interface ItemElement
     *@param  visitor of ShoppingCartVisitor interface
     *@return current,class of that particular object
     */
    public function accept(ShoppingCartVisitor $visitor)
    {
        return $visitor->visiting($this);
    }

}
//creating Visitor interface that will be implemented by concrete visitor class
interface ShoppingCartVisitor
{
	//creating abstract function visit and visiting that has to be implemented by the concrete class
    public function visit(Book $book);
    public function visiting(Fruit $fruit);
}

class ShoppingCartVisitorImpl implements ShoppingCartVisitor
{
    /**
     *implementing function visit of the interface ShoppingCartVisitor
     *@param  book of Book class
     *@return cost of that particular object
     */
    public function visit(Book $book)
    {
        $cost = 0;//creating local variable and assigning 0 to it
		
		//apply 5$ discount if book price is greater than 50
        if ($book->getPrice() > 50) {
			//if price of book is below 50
            $cost = $book->getPrice() - 5;
        } else {
			//if price of book is above 50
            $cost = $book->getPrice();
        }

		//printing the value to user
        echo ("Book ISBN::" . $book->getIsbnNumber() . " cost =" . $cost . "\n");
		
		return $cost;//returning the cost
    }
    /**
     *implementing function visiting of the interface ShoppingCartVisitor
     *@param  fruit of Fruit class
     *@return cost of that particular object
     */
    public function visiting(Fruit $fruit)
    {
		//calculating the fruits cost by getting pricePerKg and Getting weight
		$cost = $fruit->getPricePerKg() * $fruit->getWeight();
		
		//printing the value to user
		echo ($fruit->getName() . " cost = " . $cost . "\n");
		
        return $cost;//returning the cost
    }

}

//creating the class to test the working of Visitor Design Pattern
class ShoppingCartClient
{
    /**
     *Creating function testing to test the working of Visitor Design Pattern
     *@param void
     *@return void
     */
    public function testing()
    {
		//creating the item array with all the values of book object and fruit object
        $items = [new Book(20, "1234"), new Book(100, "5678"), new Fruit(10, 2, "Banana"), new Fruit(5, 5, "Apple")];

		//calling calculatePrice function to get the total cost
		$total = $this->calculatePrice($items);

		// printing the total cost of all items
        echo ("Total Cost = " . $total . "\n");
	}
	
    /**
     *Creating function calculatePrice to calculate cost of all items
     *@param items array
     *@return sum of all individual cost of items
     */
    private function calculatePrice($items)
    {
		//creating new ShoppingCartVisitorImpl object 
		$visitor = new ShoppingCartVisitorImpl();
		
		$sum = 0;//creating local variable and assigning 0 to it
		
		//looping over till the end of the array
        for ($j = 0; $j < count($items); $j++) {
			//calling accept function of class that has implemented ItemElement and getting the values and adding
            $sum = $sum + $items[$j]->accept($visitor);
        }
        return $sum;
    }

}
//try catch and finally
try {
    echo ("\n----------VISITOR DESIGN PATTERN------------\n");
    echo ("---------BEGIN TESTING VISITOR PATTERN----------\n");
    echo ("\n");

    //creating new ShoppingCartClient object
    $testor = new ShoppingCartClient;

    //calling testing function on testor object
    $testor->testing();

} catch (Exception $e) { //if exception occurs catch will hold the exception

    echo "\n", $e->getMessage();

} finally {

    echo ("\n");

    echo ("------------END TESTING VISITOR PATTERN----------------\n");
    echo ("\n");
}
