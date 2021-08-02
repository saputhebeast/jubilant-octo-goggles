<?php
    require "../resources/config.php";
    session_start();
    if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>
    <?php require "header.php";?>
<?php
    }else{
        header("Location: user.php");
        exit();
    }
?>