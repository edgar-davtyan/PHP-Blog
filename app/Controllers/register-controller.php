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
    if (empty($_POST)) {
        return $date;
    }

    if (empty($_POST["name"])) {
        $date['name']["error-message"] = "Name is required";
    } else {
        $date['name']["value"] = strip_tags($_POST["name"]);
    }
    if (empty($_POST["email"])) {
        $date['email']['error-message'] = "Email is required";
    } else {
        $date['email']['value'] = strip_tags($_POST["name"]);
        if (!filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL)){
            $date["email"]["error-message"] = "Email is not correct";
        }
    }
    if (empty($_POST["password"])) {
        $date['password']["error-message"] = "Password is required";
    }
    return $date;
}

function areThereErrors($date)
{
    if (empty($_POST)) {
        return true;
    }
    foreach ($date  as $info) {
        if (strlen($info["error-message"]) > 0) {
            return true;
        }
    }
    return false;
}

$date = validateRegister();

if (!areThereErrors($date)){
    header("Location:?p=Login");
}