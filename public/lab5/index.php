<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();

require_once 'classes/AccountInterface.php';
require_once 'classes/BankAccount.php';
require_once 'classes/SavingsAccount.php';

// Check if balance is set
if (!isset($_SESSION['balance'])) {
  $_SESSION['balance'] = 1000; // Default balance
}

// Deposit
if (isset($_POST['deposit'])) {
  $amount = (float) $_POST['amount'];
  try {
    if ($amount <= 0) {
      throw new Exception("Сума для поповнення має бути більшою за нуль.");
    }
    $_SESSION['balance'] += $amount;
    $message = "Баланс після поповнення: " . $_SESSION['balance'] . " USD";
    $messageType = "success";
  } catch (Exception $e) {
    $message = 'Помилка: ' . $e->getMessage();
    $messageType = "danger";
  }
}

// Withdraw
if (isset($_POST['withdraw'])) {
  $amount = (float) $_POST['amount'];
  try {
    if ($amount <= 0) {
      throw new Exception("Сума для зняття має бути більшою за нуль.");
    }
    if ($_SESSION['balance'] - $amount < 0) {
      throw new Exception("Недостатньо коштів на рахунку.");
    }
    $_SESSION['balance'] -= $amount;
    $message = "Баланс після зняття: " . $_SESSION['balance'] . " USD";
    $messageType = "success";
  } catch (Exception $e) {
    $message = 'Помилка: ' . $e->getMessage();
    $messageType = "danger";
  }
}

// Apply interest
if (isset($_POST['applyInterest'])) {
  try {
    $interestRate = 0.05; // 5% interest rate
    $_SESSION['balance'] += $_SESSION['balance'] * $interestRate; // Applying interest
    $message = "Відсотки нараховані. Баланс: " . $_SESSION['balance'] . " USD";
    $messageType = "success";
  } catch (Exception $e) {
    $message = 'Помилка: ' . $e->getMessage();
    $messageType = "danger";
  }
}

// Show current balance
$currentBalance = "Поточний баланс: " . $_SESSION['balance'] . " USD";
?>

<!DOCTYPE html>
<html lang="uk">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Банківський рахунок</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous">
</head>

<body>

  <div class="container mt-5">
    <!-- Status message -->
    <?php if (isset($message)): ?>
      <div id="statusMessage" class="alert alert-<?php echo $messageType; ?>" role="alert">
        <?php echo $message; ?>
      </div>
    <?php endif; ?>

    <p><?php echo $currentBalance; ?></p>

    <form method="post" class="mb-4">
      <div class="mb-3">
        <label for="amount" class="form-label">Сума для поповнення:</label>
        <input type="number" name="amount" id="amount" class="form-control" required step="any">
      </div>
      <button type="submit" name="deposit" class="btn btn-primary">Поповнити</button>
    </form>

    <form method="post">
      <div class="mb-3">
        <label for="amount" class="form-label">Сума для зняття:</label>
        <input type="number" name="amount" id="amount" class="form-control" required step="any">
      </div>
      <button type="submit" name="withdraw" class="btn btn-danger">Зняти</button>
    </form>

    <form method="post" class="mt-4">
      <button type="submit" name="applyInterest" class="btn btn-success">Нарахувати відсотки</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>

  <script>
    window.onload = function () {
      const statusMessage = document.getElementById('statusMessage');
      if (statusMessage) {
        setTimeout(function () {
          statusMessage.style.display = 'none';
        }, 5000);
      }
    };
  </script>

</body>

</html>