<?php
$url = "/catatanuang";

$servername = "localhost";
$username = "root";
$password = "";
$db = "pcup_db";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);
date_default_timezone_set('Asia/Jakarta');
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>