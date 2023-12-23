<?php
session_start();
include "config.php";
include "css.php";


$sellerloginAuth = mysqli_prepare($conn, "SELECT * FROM seller_registration_table WHERE unique_id = ?");
$sellerloginAuth->bind_param("s", $_SESSION['logins']);
$sellerloginAuth->execute();
$sellerloginAuthResult = $sellerloginAuth->get_result();

if(mysqli_num_rows($sellerloginAuthResult) == 0 ) {
    echo "<h1 class='alert_h1'> You Are Not Login From Seller Credentials. </h1>";
    exit;
}

echo "<h1 class='top_h1'> Welcome ".$_SESSION['logins_name']." </h1>";

$stmt = mysqli_prepare($conn, "SELECT products_table.*, orders_table.* FROM orders_table INNER JOIN products_table
ON orders_table.seller_id = products_table.seller_id AND products_table.id = orders_table.product_id WHERE orders_table.seller_id = ?");
$stmt->bind_param("s", $_SESSION['logins']);
$stmt->execute();
$result = $stmt->get_result();

echo "<table id='orders_table'>";
echo "<th> Order ID </th>";
echo "<th> Customer ID </th>";
echo "<th> Customer Name </th>";
echo "<th> Product Id </th>";
echo "<th> Update Status </th>";
echo "<th> Order At </th>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td> " . $row['order_id'] . " </td>";
    echo "<td> " . $row['seller_id'] . " </td>";
    echo "<td> " . $row['customer_name'] . " </td>";
    echo "<td> <a href='index.php?seller_order_product_search_id=" . $row['id'] . "' target='_blank'> Product Id </a> </td>";
    echo "<td><a href='seller_update_product_status.php?order_id=".$row['order_id']."'>" . (empty($row['order_status']) ? "Nothing" : $row['order_status']) . "</a></td>";
    $timestamp = strtotime($row['order_at']);
    $formattedOrderAt = date('Y-m-d h:i:s A', $timestamp);
    echo "<td> " . htmlspecialchars($formattedOrderAt) . " </td>";

    echo "</tr>";
}
echo "</table>";
