<?php
session_start();
include "config.php";
include "css.php";

$userSellerLoginAuth = mysqli_prepare($conn, "SELECT * FROM seller_registration_table WHERE unique_id = ?");
$userSellerLoginAuth->bind_param("i", $_SESSION['logins']);
$userSellerLoginAuth->execute();
$userSellerLoginAuthResult = $userSellerLoginAuth->get_result();

if (mysqli_num_rows($userSellerLoginAuthResult) == 0) {
    echo "<h1 class='alert_h1'>You Are Not Seller first You Have to register as a seller and then login from your seller login credentials. <a href='../login/login.html'>Login</a> </h1>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $insertProduct = mysqli_prepare($conn, "INSERT INTO products_table (title, price, seller_id) VALUES (?, ?, ?) ");
    $insertProduct->bind_param("sii", $_POST['title'], $_POST['price'], $_SESSION['logins']);
    if ($insertProduct->execute()) {
        echo "<h1 class='alert_h1'> Your Product Insert Successfully. </h1>";
    } else {
        echo "<h1 class='alert_h1'> Product Failed To Insert. </h1";
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="product_insert_form">
        <div>
            <label>Title</label><br>
            <input type="text" name="title" required>
        </div>
        <div>
            <label>Price</label><br>
            <input type="number" name="price" required>
        </div>
        <div>
            <input type="submit" value="Insert Product Details">
        </div>

    </form>
</body>

</html>