<?php
header('Content-Type: text/html; charset=UTF-8');
?>

<!DOCTYPE html>
<html lang="uk">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Main page</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h1 class="text-center">Main page</h1>

        <div class="d-flex justify-content-center pt-4">
          <a href="cart.php" class="btn btn-primary mx-2" target="_blank">Перейти до корзини</a>
          <a href="session.php" class="btn btn-primary mx-2" target="_blank">Перейти до сесії</a>
          <a href="server.php" class="btn btn-primary mx-2" target="_blank">Перейти до сервера</a>
          <a href="cookie.php" class="btn btn-primary mx-2" target="_blank">Перейти до cookie</a>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>