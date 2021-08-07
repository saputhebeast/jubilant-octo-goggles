<?php
require "../resources/config.php";
session_start();

if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
    require "header.php";
    ?>

    <?php
    $order_id = $_GET['order_id'];
    $_SESSION['order_id'] = $order_id;

    $sql = "SELECT * FROM item_order WHERE order_id = '$order_id'";
    $result = mysqli_query($conn, $sql);
    while($row = $result->fetch_assoc()){
        $order_status = $row['order_status'];
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Records</title>
    </head>
    <body>
    <style>
        .container{
            margin-top: 30px;
        }
        .alert-container{
            margin-bottom: 30px;
        }
        .button-class{
            margin-bottom: 30px;
        }
    </style>
    <div class="container">
        <div class="alert-container alert alert-primary" role="alert">
            <h1 class="text-center">Update Order Status</h1>
        </div>
        <div class="button-class">
            <a href="admin-manage-orders.php" class="btn btn-primary">Go back to dashboard</a>
        </div>
        <form action="admin-manage-order-status-submit.php" method="POST">
            <div class="form-group">
                <label for="">Order Status: </label>
                <input class="form-control" type="text" name="order_status" value = "<?php echo $order_status?>"><br>
            </div>
            <input class="btn btn-warning" type="submit" value="Change Status" name="update_status">
        </form>
    </div>
    </body>
    </html>

    <?php
}else{
    header("Location: admin.php");
    exit();
}
?>