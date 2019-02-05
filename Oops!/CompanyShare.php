<?php

class CompanyShare
{
    public $name;
    public $symbol;
    public $numOFShares;
    public $transactionDate;

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getSymbol()
    {
        return $this->symbol;
    }
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
    }
    
    public function getNumOFShares()
    {
        return $this->numOFShares;
    }
    public function setNumOFShares($numOFShares)
    {
        $this->numOFShares = $numOFShares;
    }

    public function getTransactionDate()
    {
        return $this->transactionDate;
    }
    public function setTransactionDate($transactionDate)
    {
        $this->transactionDate = $transactionDate;
    }



}

