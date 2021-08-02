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
    <div class="container">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">You haven't made any order yet!</h4>
            <hr>
            <p class="mb-0">Don't miss out on great deals! Start shopping or log in to view products added.</p>
        </div>
    </div>
<?php
    }else{
        header("Location: user.php");
        exit();
    }
?>