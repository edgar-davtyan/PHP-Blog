<?php
function getUserInfo($id)
{
    global $conn;
    $sql = "SELECT name, email, image FROM users WHERE isActive=1 AND id=$id";
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        return false;
    }
    return true;
}

function updateUserInfo($data)
{
    global $conn;
    $sql = "UPDATE users SET ";
    $res = mysqli_query($conn, $sql);
    foreach ($data as $col => $val){
        $sql.= $col . '=' . '$val, ';
    }
    $sql = substr($sql, 0, strlen($sql) - 2);
$sql.= "WHERE id = '".$data["id"]."'";
    if (!$res) {
        return false;
    }
    return true;
}