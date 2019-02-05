<?php

/**
 * Program DeckOfCards.java, to initialize deck of cards having suit
 * ("Clubs", "Diamonds", "Hearts", "Spades") & Rank
 * ("2", "3", "4", "5", "6", "7", "8", "9", "10", "Jack", "Queen", "King", "Ace").
 * Shuffle the cards using Random method and then distribute 9 Cards to 4 Players and
 * Print the Cards the received by the 4 Players using 2D Array…
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

// requires below .php file to work on
require 'DeckOfCards.php';
require 'Utilioops.php';

//enabling try catch
try {

    // creating new DeckOfCards object
    $cards = new DeckOfCards();

    // calling initializeCards func using $cards
    $card = $cards->initializeCards();
    echo "\n";
    echo "Enter the num of times to shuffle :\n";
    $num = Utilioops::taking_Num_Input(); //taking num input from user

    echo "\n";
    // lloping utill $num is less than zero
    while ($num > 0) {

        // calling shuffleCards func using $cards
        $card = $cards->shuffleCards();
        $num--; //decrementing by 1
    }

    echo "Distribution of cards for players :\n";
    echo "\n";
    // calling distributionOfCards func using $cards
    $card = $cards->distributionOfCards($card, 4, 9);

    // calling printCards func using $cards
    $cards->printCards($card);
} catch (Exception $e) {
    // to print the messeage
    echo "\n", $e->getMessage();
}
