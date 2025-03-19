<?php
$host_connect = "localhost";
$host_username = "root";
$host_password = "";
$host_db = "batch1_laundry2025";

$connect = mysqli_connect($host_connect, $host_username, $host_password, $host_db);
if (!$connect) {
    echo "Connection failed: ";
}
