<?php
header("Content-Type: text/html; charset=utf-8");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lab1</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      padding-top: 30px;
    }

    .container {
      max-width: 1000px;
    }
  </style>
</head>

<body>

  <div class="container">
    <!-- 1. Output "Hello, World!" -->
    <div class="alert alert-primary">
      <h4>Hello, World!</h4>
    </div>

    <!-- 2. Variables and data types -->
    <h3>Variables and Data Types</h3>
    <ul class="list-group">
      <li class="list-group-item">String: <?php echo $stringVar = "This is a string"; ?></li>
      <li class="list-group-item">Integer: <?php echo $intVar = 42; ?></li>
      <li class="list-group-item">Float: <?php echo $floatVar = 3.14; ?></li>
      <li class="list-group-item">Boolean: <?php echo $boolVar = true; ?></li>
    </ul>

    <h5>Variable Types</h5>
    <ul class="list-group">
      <li class="list-group-item"><?php var_dump($stringVar); ?></li>
      <li class="list-group-item"><?php var_dump($intVar); ?></li>
      <li class="list-group-item"><?php var_dump($floatVar); ?></li>
      <li class="list-group-item"><?php var_dump($boolVar); ?></li>
    </ul>

    <!-- 3. String concatenation -->
    <h3>String Concatenation</h3>
    <?php
    $firstName = "Arseniy";
    $lastName = "Zaretskiy";
    $fullName = $firstName . " " . $lastName;
    ?>
    <div class="alert alert-success">
      <strong>Full name:</strong> <?php echo $fullName; ?>
    </div>

    <!-- 4. If-else statement -->
    <h3>If-Else Statement</h3>
    <?php
    $number = 7;
    if ($number % 2 == 0) {
      echo '<div class="alert alert-info">Number ' . $number . ' is even.</div>';
    } else {
      echo '<div class="alert alert-warning">Number ' . $number . ' is odd.</div>';
    }
    ?>

    <!-- 5. Loops -->
    <h3>For Loop (1 to 10)</h3>
    <ul class="list-group">
      <?php
      for ($i = 1; $i <= 10; $i++) {
        // начальное значение, условие, шаг
        echo "<li class='list-group-item'>$i</li>";
      }
      ?>
    </ul>

    <h3>While Loop (10 to 1)</h3>
    <ul class="list-group">
      <?php
      $i = 10;
      while ($i >= 1) {
        // начальное значение, условие
        echo "<li class='list-group-item'>$i</li>";
        $i--;
      }
      ?>
    </ul>

    <!-- 6. Arrays -->
    <h3>Student Information (Array)</h3>
    <?php
    $student = array(
      "first_name" => "Arseniy",
      "last_name" => "Zaretskiy",
      "age" => 20,
      "specialty" => "Computer Science"
    );
    ?>

    <ul class="list-group">
      <li class="list-group-item">First name: <?php echo $student["first_name"]; ?></li>
      <li class="list-group-item">Last name: <?php echo $student["last_name"]; ?></li>
      <li class="list-group-item">Age: <?php echo $student["age"]; ?></li>
      <li class="list-group-item">Specialty: <?php echo $student["specialty"]; ?></li>
    </ul>

    <?php
    // Add to the array
    $student["average_grade"] = 89.5;
    ?>
    <div class="alert alert-secondary">
      <strong>Average grade:</strong> <?php echo $student["average_grade"]; ?>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>