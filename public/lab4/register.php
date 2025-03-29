<?php
include('db.php');

if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']); // md5

  // prepared statement for checking if user already exists
  $stmt1 = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
  $stmt1->bind_param("ss", $username, $email);
  $stmt1->execute();
  $result = $stmt1->get_result();

  if ($result->num_rows > 0) {
    echo "<div class='alert alert-danger'>User with this username or email already exists!</div>";
  } else {
    // prepared statement for inserting new user
    $stmt2 = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt2->bind_param("sss", $username, $email, $password);

    if ($stmt2->execute()) {
      echo "<div class='alert alert-success'>Registration successful!</div>";
    } else {
      echo "<div class='alert alert-danger'>Error: " . $stmt2->error . "</div>";
    }

    $stmt2->close();
  }

  $stmt1->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="uk">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <h2 class="mt-5">Register</h2>
    <form action="register.php" method="POST" class="mt-3">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" name="username" id="username" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" id="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>
      <button type="submit" name="register" class="btn btn-primary">Register</button>
    </form>
    <p class="mt-3">Already have an account? <a href="login.php">Log in</a></p>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>