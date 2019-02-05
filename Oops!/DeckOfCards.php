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
// creating DeckOfCards class
class DeckOfCards
{
    public $suite = null; //creating global variable with null
    public $rank = null; //creating global variable with null
    public $cards = null; //creating global variable with null

    // creating constructor to initialize values
    public function __construct()
    {

        // creating 2 array's with data provided
        $this->suite = array("Club", "Diamond", "Heart", "Spade");
        $this->rank = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "Jack", "Queen", "King", "Ace");

        // creating an empty array
        $this->cards = [];
    }

    /**
     * creating the funct to initialize the Cards
     * @param nothing
     * @return cards array
     */
    public function initializeCards()
    {
        // looping over the suite array
        for ($i = 0; $i < count($this->suite); $i++) {

            // looping over the rank array
            for ($j = 0; $j < count($this->rank); $j++) {

                // filling the 2 D array with rank and suite
                $this->cards[$i][$j] = $this->rank[$j] . "-" . $this->suite[$i];
            }
        }
        // returns the array of cards
        return $this->cards;
    }

    /**
     * creating the funct to shuffle the Cards
     * @param nothing
     * @return cards array
     */
    public function shuffleCards()
    {

        // looping over the suite array
        for ($i = 0; $i < count($this->suite); $i++) {

            // looping over the rank array
            for ($j = 0; $j < count($this->rank); $j++) {
                $firstRand = mt_rand(0, 3); //getting a random value btw 0 and 3
                $secondRand = mt_rand(0, 12); //getting a random value btw 0 and 12

                // creating a temporary variable and swaping the data
                $temp = $this->cards[$firstRand][$secondRand];
                $this->cards[$firstRand][$secondRand] = $this->cards[$i][$j];
                $this->cards[$i][$j] = $temp;
            }
        }
        // returns the card array
        return $this->cards;
    }

    /**
     * creating the funct to distribute the Cards
     * @param accepts cards array, num of players and num of cards
     * @return cards array
     */
    public function distributionOfCards($cards, $numOfPlayers, $numOfCards)
    {
        // creating temp array
        $arr = [];

        // looping over the numOfPlayers
        for ($i = 0; $i < $numOfPlayers; $i++) {

            // looping over the numOfCards
            for ($j = 0; $j < $numOfCards; $j++) {

                // copying the values to the array
                $arr[$i][$j] = $cards[$i][$j];
            }
        }
        // returning the temp array
        return $arr;
    }
    /**
     * creating the funct to print the cards
     * @param accepts cards array
     * @return nothing
     */
    public function printCards($cards)
    {
        echo "\n";
        echo "After shuffling the cards are like below :\n";
        echo "\n";
        // looping till the size of array
        for ($i = 0; $i < count($cards); $i++) {

            echo "Player " . ($i + 1) . " : [ ";

            // looping till the size of array
            for ($j = 0; $j < count($cards[$i]); $j++) {

                echo $cards[$i][$j] . " , ";//printing the data to user

            }
            echo "]\n";
        }
        echo "\n";
    }
    /**
     * get the rank of a card
     * @param card a playing card
     * @return rank
     */
    public function cards()
    {
        //creating array of cardzz
        $cardzz = [];
        $i = 0; //taking temp var and intializing to 0
        for ($x = 0; $x < count($this->suite); $x++) {

            for ($y = 0; $y < count($this->rank); $y++) {

                //adding all the data into the cardzz array
                $cardzz[$i++] = $this->rank[$y] . "," . $this->suite[$x];

            }
        }
        return $cardzz;
    }

    /**
     * function to get shuffle of cards
     * @param card a playing card
     * @return card array
     */
    public function shuffle($card)
    {
        //calculating total value
        $totalCount = (count($this->suite) * count($this->rank));

        // loops till the end of the count
        for ($x = 0; $x < $totalCount; $x++) {

            //method to get random num from 0 to total count -1(i.e, 51)
            $random = mt_rand(0, $totalCount - 1);

            $temp = $card[$x]; //copying data from x index of arary to temp var

            $card[$x] = $card[$random]; //swaping the data

            $card[$random] = $temp; //swaping the data
        }
        return $card;
    }
}
