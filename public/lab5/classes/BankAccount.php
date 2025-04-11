<?php

class BankAccount implements AccountInterface
{
  const MIN_BALANCE = 0;
  protected $balance;
  protected $currency;

  // constructor
  public function __construct($currency = 'USD', $initialBalance = 0)
  {
    $this->currency = $currency;
    $this->balance = $initialBalance;
  }

  // deposit currency
  public function deposit($amount)
  {
    if ($amount < 0) {
      throw new Exception("Сума для поповнення не може бути від'ємною");
    }
    $this->balance += $amount;
  }

  // withdraw currency
  public function withdraw($amount)
  {
    if ($amount < 0) {
      throw new Exception("Сума для зняття не може бути від'ємною");
    }
    if ($this->balance - $amount < self::MIN_BALANCE) {
      throw new Exception("Недостатньо коштів");
    }
    $this->balance -= $amount;
  }

  // balance getter
  public function getBalance()
  {
    return $this->balance;
  }

  // function to get currency
  public function getCurrency()
  {
    return $this->currency;
  }
}
?>