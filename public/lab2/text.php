<?php
header("Content-Type: text/html; charset=utf-8");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $text = $_POST['textData'];
  file_put_contents('log.txt', $text . PHP_EOL, FILE_APPEND);
}

$logData = htmlspecialchars(file_get_contents('log.txt'), ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="uk">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logger</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <div class="container mt-5">
    <form method="POST">
      <div class="form-group">
        <h2>Записати текст у файл log.txt</h2>
        <label for="textData">Введіть текст:</label>
        <textarea name="textData" id="textData" class="form-control" rows="4"
          placeholder="Введіть текст, який потрібно записати у файл..."></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Записати</button>
    </form>
    <hr>
    <h3>Вміст файлу log.txt:</h3>
    <pre><?= $logData ?></pre>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>