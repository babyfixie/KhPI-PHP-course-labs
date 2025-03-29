<?php
header('Content-Type: text/html; charset=UTF-8');

// if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
//   header('Location: cart.php');
//   exit();
// }

?>

<!DOCTYPE html>
<html lang="uk">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Server</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h1 class="text-center mb-4">Інформація про сервер</h1>
        <div class="alert alert-info">
          <p><strong>IP-адреса клієнта:</strong> <?php echo $_SERVER['REMOTE_ADDR']; ?></p>
          <p><strong>Назва та версія браузера:</strong> <?php echo $_SERVER['HTTP_USER_AGENT']; ?></p>
          <p><strong>Назва скрипта:</strong> <?php echo $_SERVER['PHP_SELF']; ?></p>
          <p><strong>Метод запиту:</strong> <?php echo $_SERVER['REQUEST_METHOD']; ?></p>
          <p><strong>Шлях до файлу на сервері:</strong> <?php echo $_SERVER['SCRIPT_FILENAME']; ?></p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>