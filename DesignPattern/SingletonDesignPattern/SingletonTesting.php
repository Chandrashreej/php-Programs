<?php


require ('Singleton.php');
/***************************************Testing********************************************/
try {
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

} catch (Exception $e) {

    echo "\n", $e->getMessage(); //printing the exception message
} finally {
    echo ("------------END TESTING SINGLETON PATTERN----------------\n");
    echo ("\n");
}