<?php
/**
 *program to create a Player Object having Deck of Cards,
 *and having ability to Sort by Rank and maintain
 *the cards in a Queue implemented using Linked List.
 *Further the Player are also arranged in Queue.
 *Finally Print the Player and the Cards received by each Player.
 *
 * @author chandrashree j
 * @since 09-01-2019
 */

// requires below .php file to work on
require_once 'Queueo.php';
require_once 'DeckPlayer.php';
require_once 'DeckOfCards.php';

//enabling try catch
try {

    $firstPlayer = new Queueo(); //creating new Queue object for player

    $secondPlayer = new Queueo(); //creating new Queue object for player

    $thirdPlayer = new Queueo(); //creating new Queue object for player

    $fourthPlayer = new Queueo(); //creating new Queue object for player

    // creating new DeckOfCards object
    $cards = new DeckOfCards();

    // creating new DeckPlayer object
    $player = new DeckPlayer();

    // calling setcards function on player object
    $player->setCards($cards->cards());

    // calling getCards function on player object and getting the value
    $cards = $player->getCards();

    // calling shuffle function on player object and getting the value
    $cards = $player->shuffle($cards);

    //looping till the end of cards array
    for ($x = 0; $x < count($cards); $x++) {

        // if and elseif and else loop depending upon the condition
        if ($x < 13) {

            $firstPlayer->enqueue($cards[$x]); //adding data to the queue using enqueue function

        } else if ($x < 26 && $x >= 13) {

            $secondPlayer->enqueue($cards[$x]); //adding data to the queue using enqueue function

        } else if ($x < 39 && $x >= 26) {

            $thirdPlayer->enqueue($cards[$x]); //adding data to the queue using enqueue function

        } else {

            $fourthPlayer->enqueue($cards[$x]); //adding data to the queue using enqueue function
        }
    }
    $firstArr = explode(" ", $firstPlayer->getData()); //exploding the string with space

    $secondArr = explode(" ", $secondPlayer->getData()); //exploding the string with space

    $thirdArr = explode(" ", $thirdPlayer->getData()); //exploding the string with space

    $fourthArr = explode(" ", $fourthPlayer->getData()); //exploding the string with space

    // calling sortCards function on player object and getting the value
    $firstArr = $player->sortCards($firstArr);

    // calling sortCards function on player object and getting the value
    $secondArr = $player->sortCards($secondArr);

    // calling sortCards function on player object and getting the value
    $thirdArr = $player->sortCards($thirdArr);

    // calling sortCards function on player object and getting the value
    $fourthArr = $player->sortCards($fourthArr);

    //creating new queue object for first player
    $firstPlayer = new Queueo();
    for ($x = 0; $x < count($firstArr); $x++) {

        $firstPlayer->enqueue($firstArr[$x]); //adding data to the queue using enqueue function
    }

    //creating new queue object for second player
    $secondPlayer = new Queueo();
    for ($x = 0; $x < count($secondArr); $x++) {

        $secondPlayer->enqueue($secondArr[$x]); //adding data to the queue using enqueue function
    }

    //creating new queue object for third player
    $thirdPlayer = new Queueo();
    for ($x = 0; $x < count($thirdArr); $x++) {

        $thirdPlayer->enqueue($thirdArr[$x]); //adding data to the queue using enqueue function
    }

    //creating new queue object for fourth player
    $fourthPlayer = new Queueo();
    for ($x = 0; $x < count($fourthArr); $x++) {

        $fourthPlayer->enqueue($fourthArr[$x]); //adding data to the queue using enqueue function
    }

    // creating new queue for all players
    $players = new Queueo();

    $players->enqueue($firstPlayer); //adding data to the queue using enqueue function

    $players->enqueue($secondPlayer); //adding data to the queue using enqueue function

    $players->enqueue($thirdPlayer); //adding data to the queue using enqueue function

    $players->enqueue($fourthPlayer); //adding data to the queue using enqueue function

    //printing the data to monitor
    echo "Players in the queue with cards are ::\n\n";

    echo "Player 1 : " . $firstPlayer->getData() . "\n\n";

    echo "Player 2 : " . $secondPlayer->getData() . "\n\n";

    echo "Player 3 : " . $thirdPlayer->getData() . "\n\n";

    echo "Player 4 : " . $fourthPlayer->getData() . "\n\n";
} catch (Exception $e) {
    // to print the messeage
    echo "\n", $e->getMessage();
}
