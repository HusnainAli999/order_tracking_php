<?php
session_start();
include "config.php";

$stmt = mysqli_prepare($conn, "SELECT * FROM orders_table WHERE order_id = ? AND customer_id = ? ");
$stmt->bind_param("ss", $_POST['order_id'], $_SESSION['logins']);
$stmt->execute();
$result = $stmt->get_result();

if(mysqli_num_rows($result) == 0) {
    echo "Sorry You have not this order Id";
    exit;
}

$order_status = mysqli_fetch_assoc($result)['order_status'];

if ($order_status === '') {
    echo "Seller Not Update Your Product Status";
    exit;
} else if ($order_status == NULL) {
    echo "Seller Not Update Your Product Status";
    exit;
} else {
    echo $order_status;
}
