<?php

class SavingsAccount extends BankAccount // inheritance
{
  public static $interestRate = 0.05; // 5% річних

  // Apply interest
  public function applyInterest()
  {
    $this->balance += $this->balance * self::$interestRate;
  }
}
?>