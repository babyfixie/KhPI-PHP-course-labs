<?php
session_start();

// page protection
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

echo "<div class='container mt-5'><h2>Welcome, " . $_SESSION['username'] . "!</h2>";

echo "<a href='logout.php' class='btn btn-danger mt-3'>Logout</a></div>";

?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">