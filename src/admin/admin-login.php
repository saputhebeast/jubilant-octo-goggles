<?php
    require_once('../resources/config.php');

    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = sha1($password);

    // echo $email;
    // echo $password;
    // echo $hashed_password;




?>