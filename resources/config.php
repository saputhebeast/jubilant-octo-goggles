<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'ecommerce';

    $conn = mysqli_connect($server, $user, $password, $database);

    if(!$conn){
        die("Connection Error: {mysqli_connect_error()}");
    }
?>