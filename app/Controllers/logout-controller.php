<?php

if  (!empty($_POST) && !empty($_POST['submit'])){
    setcookie("isLoggedIn", " ", time() - 100);
    session_unset();
    session_destroy();
    header("Location:?p=home");
}
