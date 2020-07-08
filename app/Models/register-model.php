<?php
function addNewUsers($name, $email, $password)
{
    global $conn;
    $sql = "INSERT INTO users(name, email,password , isActive) VALUES('$name', '$email', '$password', 1)";
    $response = mysqli_query($conn, $sql);
    return $response;
}
