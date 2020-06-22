<?php
function validateRegister()
{
    $date = [
        "name" => [
            "value" => "",
            "error-message" => "",
        ],
        "email" => [
            "value" => "",
            "error-message" => "",
        ],
        "password" => [
            "value" => "",
            "error-message" => "",
        ]
    ];
    if (!empty($_POST)) {
        return $date;
    }

    if (empty($_POST["name"])) {
        $date['name']["error-message"] = "Name is required";
    } else {
        $date['name']["value"] = $_POST["name"];
    }
    if (empty($_POST["email"])) {
        $date['email']['error-message'] = "Email is required";
    } else {
        $date['email']['value'] = $_POST["name"];
    }
    if (empty($_POST["password"])) {
        $date['password']["error-message"] = "Password is required";
    } else {
        $date['password']['value'] = $_POST["name"];
    }
    return $date;
}

$date = validateRegister();