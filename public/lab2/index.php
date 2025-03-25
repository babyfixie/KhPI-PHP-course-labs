<?php
header("Content-Type: text/html; charset=utf-8");
?>

<!DOCTYPE html>
<html lang="uk">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lab 2</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <h2>Завантажити файл</h2>
    <form action="process.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="fileToUpload">Виберіть файл для завантаження:</label>
        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control-file">
      </div>
      <button type="submit" class="btn btn-primary">Завантажити файл</button>
    </form>

    <hr>

    <div>
      <a href="list.php" class="btn btn-link">Переглянути список файлів</a>
      <a href="text.php" class="btn btn-link">Записати текст у файл</a>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>