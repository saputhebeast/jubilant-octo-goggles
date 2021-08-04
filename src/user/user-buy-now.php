<?php
    session_start();
    require_once('../resources/config.php');

    if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
        
    }else{
        header("Location: user-login.php");
    }
?>