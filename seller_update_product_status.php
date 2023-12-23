<?php
session_start();
include "config.php";
include "css.php";

if (!isset($_GET['order_id'])) {
    echo "<h1> order Id is not set </h1>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = mysqli_prepare($conn, "UPDATE orders_table SET order_status = ? WHERE order_id = ?");
    $stmt->bind_param("si", $_POST['update_order_status'], $_GET['order_id']);
    if ($stmt->execute()) {
        echo "<h1 class='alert_h1'> Order Status of : " . $_GET['order_id'] . " Is Set Properly. </h1>";
    } else {
        echo "<h1 class='alert_h1'> Sorry, We Cannot Update Order Status . </h1>";
        exit;
    }
}

?>
<h1 class="top_h1">Update Your Order Status</h1>
<form action="" method="POST" id="update_order_status_form">
    <div>
        <label> Update Order Status </label><br>
        <input type="text" name="update_order_status" placeholder="Enter Order Status">
    </div>
    <div>
        <button type="submit">Update Status</button>
    </div>
</form>