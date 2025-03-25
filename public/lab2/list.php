<?php
header("Content-Type: text/html; charset=utf-8");

$uploadDir = 'uploads/';
$files = scandir($uploadDir);
?>

<!DOCTYPE html>
<html lang="uk">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Список файлів</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <div class="container mt-5">
    <h2>Список файлів у директорії uploads:</h2>

    <div class="list-group">
      <?php
      foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
          echo "<a href='$uploadDir$file' class='list-group-item list-group-item-action' download>$file</a>";
        }
      }
      ?>
    </div>

    <hr>

    <a href="index.php" class="btn btn-primary">Повернутися на головну</a>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>