<?php

if  (!empty($_POST) && !empty($_POST['submit'])){
    session_unset();
    session_destroy();
    header("Location:?p=home");
}
