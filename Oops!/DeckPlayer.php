
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
require_once 'Utilioops.php';
require_once 'Queueo.php';
require_once 'DeckOfCards.php';

// creating DeckPlayer class
class DeckPlayer
{
    //creating global variables and intializing it to default values
    public $palyerNumber = 0;
    public $cards = null;
    public $queue = null;

    /**
     * function to set the cards of a player
     * @param a queue of cards
     * @return nothing
     */
    public function setCards($cards)
    {
        $this->cards = $cards;
    }

    /**
     * function to get queue of cards of a player
     * @param nothing
     * @return queue of cards
     */
    public function getCards()
    {
        return $this->cards;
    }

    /**
     * function to set the num of a player
     * @param num of player
     * @return nothing
     */
    public function setPlayerNumber($num)
    {
        $this->palyerNumber = $num;
    }

    /**
     * function to get queue of cards of a player
     * @param nothing
     * @return num of particular player
     */
    public function getPlayerNumber()
    {
        return $this->palyerNumber;
    }

    /**
     * function to sort the cards
     * @param cards queue
     * @return cards queue which is modified
     */
    public function sortCards($cards)
    {
        $num = count($cards);
        $cards = Utilioops::insertionSortForStr($cards, $num);
        return $cards;
    }

    /**
     * function to shuffle the cards
     * @param cardzz queue
     * @return cardzz queue which is modified
     */
    public function shuffle($cardzz)
    {
        $cards = new DeckOfCards();
        $cardzz = $cards->shuffle($cardzz);
        return $cardzz;
    }

}
?>