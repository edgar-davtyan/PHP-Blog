<?php
session_destroy();
if (!empty($_SESSION["userId"])) {
    session_destroy();
    header("Location: ?" . $_SERVER["QUERY_STRING"]);
}
function validateLogin()
{
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
        $userDate = mysqli_fetch_all(getUserByEmail($date["email"]["value"]), MYSQLI_ASSOC);
        if (count($userDate) === 0) {
            $date["authorization"]["error-message"] = "No such user with given email";
        } else {
            if (password_verify($_POST["password"], $userDate[0]["password"])) {
                setcookie("isLoggedIn", true, strtotime("+2 days"));
                $_SESSION["userID"] = $userDate[0]["id"];
                header("Location:?p=Profile");
            }else{
                $date["authorization"]["error-message"] = "Email or Password is not correct";
            }
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