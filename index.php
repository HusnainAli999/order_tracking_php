<?php
session_start();
include "config.php";
include "css.php";
include "cdn.php";

echo "<h1 class='top_h1'> Order Tracking System By Husnain Ali </h1>";

$customerLoginAuth = mysqli_prepare($conn, "SELECT * FROM customer_registration_table WHERE unique_id = ?");
$customerLoginAuth->bind_param("i", $_SESSION['logins']);
$customerLoginAuth->execute();
$customerLoginAuthResult = $customerLoginAuth->get_result();


if (mysqli_num_rows($customerLoginAuthResult) == 0) {
    $customerAuth = FALSE;
    echo "You Are Not Login As a Customer So You Cannot Buy Any Product Or chceck any order status";
} else {
    $customerAuth = TRUE;
}

if ($customerAuth == TRUE) {

    echo "<i class='fa-solid fa-bell'></i>";
    echo "<div class='order_tracking_form_div'>
<p>Order Tracking</p>
<form method='POST' id='order_tracking_form'>
  <input type='text' name='order_id' placeholder='Enter Order ID' />
  <button type='submit'>Search</button>
</form>
</div>";
} else {
    echo "";
}



$stmt = mysqli_prepare($conn, "SELECT * FROM products_table");
$stmt->execute();
$result = $stmt->get_result();

echo "<h1> <a class='redirect_a' href='./login/login.html'>Login</a> <a class='redirect_a' href='./register/customer_register.html'>Customer Register</a> <a class='redirect_a' href='./register/seller_register.html'>Seller Register</a> <a class='redirect_a' href='insert_poducts.php'> Add Product </a> <a class='redirect_a' href='sellers_orders.php'> Sellers Orders </a>  <a class='redirect_a' href='customers_orders.php'> Customer Orders </a> </h1>";
echo "<div class='product_position_handler_div'>";
while ($row = mysqli_fetch_assoc($result)) {
    if (isset($_GET['seller_order_product_search_id']) && $_GET['seller_order_product_search_id'] == $row['id']) {
        echo "<div class='product_inner_cover_div' style='background:darkred; color:white;'>";
    } else if (isset($_GET['customer_order_product_search_id']) && $_GET['customer_order_product_search_id'] == $row['id']) {
        echo "<div class='product_inner_cover_div' style='background:yellowgreen; color:white;'>";
    } else {
        echo "<div class='product_inner_cover_div'>";
    }
    echo "<p> Title : " . $row['title'] . " </p>";
    echo "<p> Price : " . $row['price'] . " </p>";

    $getSellerName = mysqli_prepare($conn, "SELECT * FROM seller_registration_table WHERE unique_id = ?");
    $getSellerName->bind_param("s", $row['seller_id']);
    $getSellerName->execute();
    $sellerNameResult = $getSellerName->get_result();

    $sellerName = mysqli_fetch_assoc($sellerNameResult)['name'];


    if ($customerAuth == TRUE) {
        echo "<p> <a href='product_buy_process.php?pro_id=" . $row['id'] . "&seller_id=" . $row['seller_id'] . "&customer_id=" . $_SESSION['logins'] . "&customer_name=" . $_SESSION['logins_name'] . "&seller_name=" . $sellerName . "'>Buy Now</a> </p>";
    } else {
        echo "";
    }
    echo "</div>";
}
echo "</div>";
?>
<script src="logic.js"></script>