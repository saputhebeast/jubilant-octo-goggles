<?php
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>

        <?php require "header.php"?>
    <?php
        $admins = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin"));
        $users = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM customer"));
        $laptops = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM laptop"));
        $orders = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM item_order"));
        $keyboards = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM keyboard"));
        if(mysqli_query($conn, "SELECT * FROM mouse")){$mice = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM mouse"));}else{$mice = 0;}
        $subscribers = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM newsletter"));
//        echo "<h1>Overview</h1>";
//        echo "<h2>Number of Admins: {$admins}</h2>";
//        echo "<h2>Number of Users: {$users}</h2>";
//        echo "<h2>Number of Laptops: {$laptops}</h2>";
            date_default_timezone_set("Asia/Colombo");
            $date = date("h: i a");
    ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Dashboard</title>
        </head>
        <body>
        <style>
            .container{
                margin-top: 30px;
            }
        </style>
            <div class="container">
                <div class="alert-container alert alert-primary" role="alert">
                    <h1 class="text-center">Admin Dashboard</h1>
                </div>
            <div class="container">
                <div class="card-deck">
                    <div class="card h-25 d-inline-block">
                        <div class="card-body text-center">
                            <h5 class="card-title">Registered Admins Count</h5>
                            <h4 class="card-text text-danger"><strong><?php echo $admins?></strong></h4>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated: <?php echo $date?></small>
                        </div>
                    </div>
                    <div class="card h-25 d-inline-block">
                        <div class="card-body text-center">
                            <h5 class="card-title">Registered Users Count</h5>
                            <h4 class="card-text text-danger"><strong><?php echo $users?></strong></h4>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated: <?php echo $date?></small>
                        </div>
                    </div>
                    <div class="card h-25 d-inline-block">
                        <div class="card-body text-center">
                            <h5 class="card-title">Orders Count</h5>
                            <h4 class="card-text text-danger"><strong><?php echo $orders?></strong></h4>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated: <?php echo $date?></small>
                        </div>
                    </div>

                    <div class="container">
                        <div class="card-deck">
                            <div class="card h-25 d-inline-block">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Listed Laptops Count</h5>
                                    <h4 class="card-text text-danger"><strong><?php echo $laptops?></strong></h4>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Last updated: <?php echo $date?></small>
                                </div>
                            </div>
                            <div class="card h-25 d-inline-block">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Listed Keyboards Count</h5>
                                    <h4 class="card-text text-danger"><strong><?php echo $keyboards?></strong></h4>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Last updated: <?php echo $date?></small>
                                </div>
                            </div>
                            <div class="card h-25 d-inline-block">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Listed Mice Count</h5>
                                    <h4 class="card-text text-danger"><strong><?php echo $mice?></strong></h4>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Last updated: <?php echo $date?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="card-deck">
                            <div class="card h-25 d-inline-block">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Newsletter Subscribers</h5>
                                    <h4 class="card-text text-danger"><strong><?php echo $subscribers?></strong></h4>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Last updated: <?php echo $date?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>

