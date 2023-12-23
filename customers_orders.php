<?php
session_start();
include "config.php";
include "css.php";


$customerloginAuth = mysqli_prepare($conn, "SELECT * FROM customer_registration_table WHERE unique_id = ?");
$customerloginAuth->bind_param("s", $_SESSION['logins']);
$customerloginAuth->execute();
$customerloginAuthResult = $customerloginAuth->get_result();

if(mysqli_num_rows($customerloginAuthResult) == 0 ) {
    echo "<h1 class='alert_h1'> You Are Not Login From Customer Credentials. </h1>";
    exit;
}

echo "<h1 class='top_h1'> Welcome ".$_SESSION['logins_name']." </h1>";

$stmt = mysqli_prepare($conn, "SELECT products_table.*, orders_table.* FROM orders_table INNER JOIN products_table
ON orders_table.seller_id = products_table.seller_id AND products_table.id = orders_table.product_id WHERE orders_table.customer_id = ?");
$stmt->bind_param("s", $_SESSION['logins']);
$stmt->execute();
$result = $stmt->get_result();

echo "<table id='orders_table'>";
echo "<th> Order ID </th>";
echo "<th> Customer ID </th>";
echo "<th> Seller Name </th>";
echo "<th> Product Id </th>";
echo "<th> Order At </th>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td> " . $row['order_id'] . " </td>";
    echo "<td> " . $row['customer_id'] . " </td>";
    echo "<td> " . $row['seller_name'] . " </td>";
    echo "<td> <a href='index.php?customer_order_product_search_id=" . $row['id'] . "' target='_blank'> Product Id </a> </td>";

    $timestamp = strtotime($row['order_at']);
    $formattedOrderAt = date('Y-m-d h:i:s A', $timestamp);
    echo "<td> " . htmlspecialchars($formattedOrderAt) . " </td>";

    echo "</tr>";
}
echo "</table>";
