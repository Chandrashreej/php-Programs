<?php
/**
 *@fileName:tictacToe.php
 *@Desc: Program to play a Cross Game or Tic-Tac-Toe Game. Player 1 is the Computer and
 *the Player 2 is the user. Player 1 take Random Cell that is the Column and Row.
 *
 *@author Chandrashreej
 *@version 1.0
 *@since 9/01/2019
 */
require 'Utility.php';

class TicTacToe
{

    //static variables to run the game
    // static variable to store value in 2d array;
    public static $board = array(array(), array());

    //static variable to store player value
    public static $player = 1;

    //static boolean to store if there is a place in the board
    public static $isempty = true;

    //function to initialize array with defualt value -10
    public function initBoard()
    {
        echo "TicTacTOe Game\n\n";
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                self::$board[$i][$j] = -10;
            }
        }
        echo "Player is X";
    }

    //function to display board with current values of x and y
    public function dispBoard()
    {
        $count = 0;
        for ($i = 0; $i < 3; $i++) {
            echo "---------------\n";
            echo "||";
            //displays X and O only if there is calculates the monthly payments you would have to make over Y years to pay off a P principal loan amount at R per cent interest compounded monthly. and 1
            //other wise display blank
            for ($j = 0; $j < 3; $j++) {
                if (self::$board[$i][$j] == 0) {
                    $count++;
                    echo " O |";
                } else if (self::$board[$i][$j] == 1) {
                    $count++;
                    echo " X |";
                } else {
                    echo "   |";
                }
            }
            echo "|\n";
            //checking the board if it has space left or not
            if ($count == 9) {
                self::$isempty == false;
            }
            echo "---------------\n";
        }
    }

    /**
     * Function to check for win
     * @return true if won
     * @return false if not won
     */
    public function win()
    {
        return ((self::$board[0][0] + self::$board[0][1] + self::$board[0][2] == self::$player * 3)
            || (self::$board[1][0] + self::$board[1][1] + self::$board[1][2] == self::$player * 3)
            || (self::$board[2][0] + self::$board[2][1] + self::$board[2][2] == self::$player * 3)
            || (self::$board[0][0] + self::$board[1][0] + self::$board[2][0] == self::$player * 3)
            || (self::$board[0][1] + self::$board[1][1] + self::$board[2][1] == self::$player * 3)
            || (self::$board[0][2] + self::$board[1][2] + self::$board[2][2] == self::$player * 3)
            || (self::$board[0][0] + self::$board[1][1] + self::$board[2][2] == self::$player * 3)
            || (self::$board[2][0] + self::$board[1][1] + self::$board[0][2] == self::$player * 3));
    }

    /**
     * Function to put values in the board
     */
    public function putVal()
    {
        $i;
        $j;
        /**
         * check  for player value and give input
         */

        if (self::$player == 0) {
            //get computers input using random
            $i = rand(0, 2);
            $j = rand(0, 2);
        } else {
            //getting user input untill desired value is entered
            $i = Utility::takingnuminput();
            $j = Utility::takingnuminput();
            while ($i > 2 || $j > 2) {
                echo "Enter correct values";
                $i = Utility::takingnuminput();
                $j = Utility::takingnuminput();
            }
        }
        //put value in the board
        if (self::$board[$i][$j] == -10) {
            if (self::$player == 0) {
                self::$board[$i][$j] = 0;
                echo "computer choosing " . $i . " " . $j . "\n";
            } else {
                self::$board[$i][$j] = 1;
            }
        } else {
            TicTacToe::putVal();
        }
    }

    /**
     * simulate play of tic tac toe by calling other methods
     */
    public function play()
    {
        /**
         * run the game by calling init function and checkin for win after each put value function call
         */
        self::initBoard();
        self::dispBoard();
        //run the game while boars is empty
        while (self::$isempty) {
            echo " players turn ";
            self::putVal();
            self::dispBoard();
            if (self::win()) {
                echo "Player won";
                return;
            }
            self::$player = 0;
            echo "computers turn\n";
            self::putVal();
            self::dispBoard();
            if (self::win()) {
                echo "computer won\n";
                return;
            }
            self::$player = 1;

        }
        //if no one won then the game will be draw !!!!
        if (self::$isempty == false) {
            echo "Draw";
        }
    }
}

TicTacToe::play();
