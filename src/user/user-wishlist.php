<?php
    require "../resources/config.php";
    session_start();
    if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>
    <?php require "header.php";?>
    <style>
        .container{
            margin-top: 30px;
        }
    </style>
    <div class="container">
        <h1><?php echo ucfirst($_SESSION['first_name'])?>'s Wishlist</h1>
    </div>
<?php
    }else{
        header("Location: user.php");
        exit();
    }
?>