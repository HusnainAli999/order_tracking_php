<?php
include "../config.php";
session_start();
include "../css.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Check in customer table
    $stmt = mysqli_prepare($conn, "SELECT * FROM customer_registration_table WHERE email = ?");
    $stmt->bind_param("s", $_POST['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($_POST['password'], $row['password'])) {
            $_SESSION['logins'] = $row['unique_id'];
            $_SESSION['logins_name'] = $row['name'];
            echo "<h1 class='alert_h1'> You are logged in successfully as a Customer
                <script>
                  setTimeout(function() {
                    window.location.href='../index.php';
                  }, 3000);
                </script>
                </h1>";
            exit;
        }
    }

    // Check in seller table
    $stmt2 = mysqli_prepare($conn, "SELECT * FROM seller_registration_table WHERE email = ?");
    $stmt2->bind_param("s", $_POST['email']);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    if (mysqli_num_rows($result2) > 0) {
        $row2 = mysqli_fetch_assoc($result2);
        if (password_verify($_POST['password'], $row2['password'])) {
            $_SESSION['logins'] = $row2['unique_id'];
            $_SESSION['logins_name'] = $row2['name'];
            echo "<h1 class='alert_h1'> You are logged in successfully as a Seller
                <script>
                  setTimeout(function() {
                    window.location.href='../index.php';
                  }, 3000);
                </script>
                </h1>";
            exit;
        }
    }

    // If no matches found in either table
    echo "<h1 class='alert_h1'> Email or Password incorrect </h1>";
    exit;
}


?>
