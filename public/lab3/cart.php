<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();

if (isset($_POST['add_to_cart'])) {
  $product = $_POST['product'];
  $_SESSION['cart'][] = $product;
  header('Location: cart.php');
  exit();
}

if (isset($_COOKIE['previous_cart'])) {
  $previous_cart = unserialize($_COOKIE['previous_cart']);
  foreach ($previous_cart as $product) {
    echo "<p>Попередній товар: $product</p>";
  }
}
?>

<!DOCTYPE html>
<html lang="uk">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h1>Cart</h1>

        <div class="alert alert-info">
          <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            <h3>Товари в корзині:</h3>
            <ul>
              <?php foreach ($_SESSION['cart'] as $product): ?>
                <li><?php echo htmlspecialchars($product); ?></li>
              <?php endforeach; ?>
            </ul>
          <?php else: ?>
            <p>Корзина пуста.</p>
          <?php endif; ?>
        </div>

        <div class="alert alert-warning">
          <?php if (isset($_COOKIE['previous_cart'])): ?>
            <h3>Попередній товар:</h3>
            <ul>
              <?php foreach ($previous_cart as $product): ?>
                <li><?php echo htmlspecialchars($product); ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>

        <h2>Додати товар до корзини:</h2>
        <form method="post" class="form-inline">
          <div class="mb-3">
            <input type="text" name="product" class="form-control" required placeholder="Назва товару">
          </div>
          <button type="submit" name="add_to_cart" class="btn btn-primary">Додати в корзину</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>