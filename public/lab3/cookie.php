<?php
header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  setcookie('username', $username, time() + 7 * 24 * 60 * 60); // 7 * 24 * 60 * 60 is the number of seconds in 7 days (7 days * 24 hours/day * 60 minutes/hour * 60 seconds/minute)

  header('Location: cookie.php');
  exit();
}

if (isset($_POST['delete_cookie'])) {
  setcookie('username', '', time() - 3600);
  header('Location: cookie.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="uk">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cookie</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h1 class="text-center">Cookie</h1>

        <?php if (isset($_COOKIE['username'])): ?>
          <div class="alert alert-success" role="alert">
            Привіт, <?php echo $_COOKIE['username']; ?>!
          </div>
        <?php else: ?>
          <div class="alert alert-warning" role="alert">
            Привіт, незнайомець!
          </div>
        <?php endif; ?>

        <h3 class="mt-4">Введіть своє ім'я:</h3>
        <form method="post">
          <div class="form-group mb-3">
            <input type="text" name="username" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>

        <form method="post" class="mt-3">
          <button type="submit" name="delete_cookie" class="btn btn-danger">Видалити cookie</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>