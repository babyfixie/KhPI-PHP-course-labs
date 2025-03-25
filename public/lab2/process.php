<?php
header("Content-Type: text/html; charset=utf-8");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Перевірка, чи файл був завантажений
  if (is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
    // Отримуємо інформацію про файл
    $fileName = $_FILES['fileToUpload']['name'];
    $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
    $fileSize = $_FILES['fileToUpload']['size'];

    // Перевірка типу файлу за розширенням
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedExtensions = array('png', 'jpg', 'jpeg');

    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
      echo '<div class="alert alert-danger" role="alert">Невірний тип файлу. Дозволені лише зображення (png, jpg, jpeg).</div>';
      exit;
    }

    // Перевірка розміру файлу
    if ($fileSize > 2 * 1024 * 1024) {  // Максимум 2 МБ
      echo '<div class="alert alert-danger" role="alert">Розмір файлу надто великий. Максимальний розмір - 2 МБ.</div>';
      exit;
    }

    // Перевірка наявності файлу з таким ім'ям
    $uploadDir = 'uploads/';
    if (!file_exists($uploadDir)) {
      mkdir($uploadDir, 0777, true);
    }

    $filePath = $uploadDir . basename($fileName);
    if (file_exists($filePath)) {
      $fileName = time() . '_' . $fileName;  // Додаємо унікальний суфікс
      $filePath = $uploadDir . $fileName;
    }

    // Переміщуємо файл в папку uploads
    if (move_uploaded_file($fileTmpName, $filePath)) {
      echo '<div class="alert alert-success" role="alert">Файл завантажено успішно!</div>';
      echo "<p>Ім'я файлу: $fileName</p>";
      echo "<p>Тип файлу: " . $fileExtension . "</p>";
      echo "<p>Розмір файлу: " . round($fileSize / 1024, 2) . " KB</p>";
      echo "<p><a href='$filePath' class='btn btn-primary' download>Завантажити файл</a></p>";
    } else {
      echo '<div class="alert alert-danger" role="alert">Помилка при завантаженні файлу.</div>';
    }
  } else {
    echo '<div class="alert alert-warning" role="alert">Файл не було завантажено.</div>';
  }
}
?>

<!DOCTYPE html>
<html lang="uk">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Завантаження файлів</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="padding: 30px;">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>