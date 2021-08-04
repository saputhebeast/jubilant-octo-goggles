<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>
    <?php 
        require "header.php";
        if (isset($_GET['status']) | isset($_GET['status'])) {
            if ($_GET['status'] === 'success') {
        ?>
                <link rel="stylesheet" href="../styles/user/user-checkout-complete-success.css">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mx-auto mt-5">
                            <div class="payment">
                                <div class="payment_header">
                                    <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
                                </div>
                                <div class="content">
                                    <h1>Payment Success !</h1>
                                    <p>Your order has been successfully placed.</p>
                                    <a href="user.php" class="btn btn-success">Go to Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }else{
            ?>
                <link rel="stylesheet" href="../styles/user/user-checkout-complete-fail.css">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mx-auto mt-5">
                            <div class="payment">
                                <div class="payment_header">
                                    <div class="check"><i class="fa fa-times" aria-hidden="true"></i></div>
                                </div>
                                <div class="content">
                                    <h1>Payment Failed !</h1>
                                    <p>Your order has not been successfully placed.</p>
                                    <a href="user.php" class="btn btn-danger">Go to Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require "footer.php"?>
    <?php
        }
        }else{
            echo "<script type='text/javascript'>";
            echo "window.location.href = 'user.php'";
            echo "</script>";
        }
    }else{
        header("Location: user.php");
        exit();
    }
?>