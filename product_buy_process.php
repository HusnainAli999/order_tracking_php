<?php
session_start();
include "config.php";
include "css.php";


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (empty($_GET['seller_id']) && empty($_GET['customer_id']) && empty($_GET['pro_id']) && empty($_GET['customer_name']) && empty($_GET['seller_name'])) {
        echo "<h1 class='alert_h1'>  Something Missing Seller id, Or Customer id, or perhaps product id. OR customer Name Or Seller name </h1>";
        exit;
    }

    $stmt = mysqli_prepare($conn, "INSERT INTO orders_table (seller_id, customer_id, customer_name, seller_name, product_id) VALUES (?, ?, ?, ?, ?) ");
    $stmt->bind_param("ssssi", $_GET['seller_id'], $_GET['customer_id'], $_GET['customer_name'], $_GET['seller_name'], $_GET['pro_id']);
    if ($stmt->execute()) {
        echo "<h1 class='alert_h1'> " . $_SESSION['logins_name'] . " Your Order For Product : " . $_GET['pro_id'] . " Placed Successfully.</h1>";
    } else {
        echo "<h1 class='alert_h1'> Order Cannot Placed Execution Failed. </h1>";
        exit;
    }
}
