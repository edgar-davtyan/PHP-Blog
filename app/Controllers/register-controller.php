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
        ],
        "authorization" => [
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
        $date['email']['value'] = strip_tags($_POST["email"]);
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $date["email"]["error-message"] = "Email is not correct";
        }
    }
    if (empty($_POST["password"])) {
        $date['password']["error-message"] = "Password is required";
    } else {
        $date["password"]["value"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
    }
    return $date;
}

function areThereErrors($date)
{
    if (empty($_POST)) {
        return true;
    }
    foreach ($date as $info) {
        if (strlen($info["error-message"]) > 0) {
            return true;
        }
    }
    return false;
}

$date = validateRegister();

if (!areThereErrors($date)) {
    $res = addNewUsers($date["name"]["value"], $date["email"]["value"], $date["password"]["value"]);
    print_r($res);
    if (!$res) {
        $err = mysqli_error($conn);
        if ($err == "Duplicate entry '".$date["email"]["value"]."' for key 'email'") {
            $date["authorization"]["error-message"] = "User with email " . $date["email"]["value"] . " already exist.";
        }
    }else{
        header("Location:?p=login");
    }
}