<?php
function addNewUsers($name, $email, $password)
{
    global $conn;
    $sql = "INSERT INTO users(name, email,password , isActive) VALUES('$name', '$email ', '$password', 1)";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    }else{
        echo "Errord" .$sql . "<br>" . mysqli_error($conn);
    }
}
