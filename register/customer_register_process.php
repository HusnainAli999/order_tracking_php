<?php
include "../config.php";
include "../css.php";

$uniqueID = uniqid();
$randomBytes = random_bytes(8);

$uniqueID .= bin2hex($randomBytes);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $stmt = mysqli_prepare($conn, "INSERT INTO customer_registration_table (name, email, password, unique_id)  VALUES (?, ?, ?, ?) ");
  $stmt->bind_param("ssss", $_POST['name'], $_POST['email'], $password, $uniqueID);
  if ($stmt->execute()) {
    echo "<h1 class='alert_h1'> You Are Successfully Register For Customer Designation
        <script>
        setTimeout(function() {
          window.location.href='../login/login.html';
        }, 3000);
      </script>
        </h1>";
  } else {
    echo "<h1 class='alert_h1'>Failed to register /h1>";
    exit;
  }
}
