<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "blog";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connected failed:" . mysqli_connect_errno());
}
