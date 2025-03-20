<?php
header("Content-Type: text/html; charset=utf-8");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Processing</title>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // read trim
          $firstName = trim($_POST['firstName']);
          $lastName = trim($_POST['lastName']);

          // validate form data
          if (empty($firstName) || empty($lastName)) {
            echo "<div class='alert alert-danger'>Both First Name and Last Name are required!</div>";
          } elseif (!preg_match("/^[a-zA-Zа-яА-ЯёЁ\s]+$/u", $firstName) || !preg_match("/^[a-zA-Zа-яА-ЯёЁ\s]+$/u", $lastName)) {
            echo "<div class='alert alert-danger'>Both First Name and Last Name must contain only letters and spaces!</div>";
          } else {
            echo "<div class='alert alert-success'>";
            echo "<h4>Hello, $firstName $lastName!</h4>";
            echo "</div>";
          }
        }
        ?>
        <a href="index.html" class="btn btn-secondary">Go back to the form</a>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>