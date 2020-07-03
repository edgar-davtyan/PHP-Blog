<?php

if  (!empty($_POST) && !empty($_POST['submit'])){
    setcookie("isLoggedIn", " ", time() - 100);
    header("Location:?p=home");
}
