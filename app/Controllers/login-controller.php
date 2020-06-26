<?php

function validateLogin()
{
    $login = "edgar.davtyan.01@test.ru";
    $pass = '$2y$10$lBYIcJFnpif8xn3wdNKCuuRThcRqadir6scGEPr4pBJAf6JYQ5jzy';
    $date = [
        "email" => [
            "value" => "",
            "error-message" => "",
        ],
        "password" => [
            "error-message" => "",
        ],
        "authorization" => [
            "error-message" => "",
        ]

    ];
    if (empty($_POST)) {
        return $date;
    }
    if (empty($_POST["email"])) {
        $date['email']["error-message"] = "Name is required";
    } else
        $date["email"]["value"] = strip_tags($_POST["email"]);
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $date["email"]["error-message"] = "Email is not correct";
    }
    if (empty($_POST["password"])) {
        $date["password"]["error-message"] = "Password is required";
    } else {
        if ((empty($date['email']['error-message'])) && $date['email']['value'] == $login && password_verify($_POST['password'], $pass)) {
            setcookie("isLoggedIn", true, strtotime("+2 days"));
            header("Location:?p=Profile");
        } else {
            $date['authorization']['error-message'] = "Email or Password is not correct";
        }
    }
    return $date;
}

function areThereErrors($date)
{
    if (empty($_POST)) {
        return $date;
    }
    foreach ($date as $info) {
        if (strlen($info["error-message"]) > 0) {
            return true;
        }
    }

    return false;
}

$date = validateLogin();
/*if (!areThereErrors($date)) {
    header("Location:?p=Profile");
}*/