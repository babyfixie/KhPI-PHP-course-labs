<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();

$users = array(
  'admin' => 'pass',
  'user1' => 'mypassword',
  'user' => 'pass1'
);

if (isset($_POST['logout'])) {
  session_destroy();
  header('Location: session.php');
  exit();
}

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
} else {
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username_input = $_POST['username'];
    $password_input = $_POST['password'];

    if (isset($users[$username_input]) && $users[$username_input] === $password_input) {
      $_SESSION['username'] = $username_input;
      header('Location: session.php');
      exit();
    } else {
      $error_message = "Невірний логін або пароль!";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="uk">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Session</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <?php if (isset($username)): ?>
          <div class="alert alert-success">
            <h1>Привіт, <?php echo $username; ?>!</h1>
          </div>
          <form method="post">
            <button type="submit" name="logout" class="btn btn-danger">Вихід</button>
          </form>
        <?php else: ?>
          <h1>Enter your credentials</h1>

          <?php if (isset($error_message)): ?>
            <div class="alert alert-danger">
              <?php echo $error_message; ?>
            </div>
          <?php endif; ?>

          <form method="post">
            <div class="mb-3">
              <label for="username" class="form-label">Login</label>
              <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Log in</button>
          </form>
        <?php endif; ?>
      </div>
    </div>
  </div>
</body>

</html>