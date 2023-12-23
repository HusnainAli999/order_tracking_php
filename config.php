<?php

$conn = new mysqli("localhost", "root", "", "order_tracking_database");

if (!$conn) {
    echo "Major Connection Failed" . mysqli_connect_error();
    exit;
}
