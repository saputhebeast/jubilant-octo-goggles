<?php
    session_start();
    require "../resources/config.php";
    if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>
    <?php require "header.php";?>
    <style>
        .container{
            margin-top: 30px;
        }
    </style>
    <div class="container">
        <h1><?php echo ucfirst($_SESSION['first_name'])?>'s Orders</h1>
    </div>
<?php
    }else{
        header("Location: user.php");
        exit();
    }
?>