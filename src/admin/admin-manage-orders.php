<?php
require "../resources/config.php";
session_start();

if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
    require "header.php";
    $sql = "SELECT * FROM item_order;";
        $result = mysqli_query($conn, $sql);

        $numberOfRows = $result->num_rows;
        $results_per_page = 5;
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Orders</title>
    </head>
    <body>
    <style>
        .container{
            margin-top: 30px;
            margin-bottom: 30px;
        }
        .alert-container{
            margin-bottom: 30px;
        }
        .button-class{
            margin-bottom: 30px;
        }
        tbody a{
            margin-right: 10px;
        }
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }
        th, td {
            white-space: nowrap;
        }
        .next{
            margin-left: 10px;
            margin-bottom: 30px;
        }
    </style>
    <div class="container">
        <div class="alert-container alert alert-primary" role="alert">
            <h1 class="text-center">Manage Orders</h1>
        </div>
        <div class="button-class">
            <a href="admin.php" class="btn btn-primary">Go back to dashboard</a>
        </div>
        <div class="container overflow-auto">
            <?php
//           echo $numberOfRows;
            $number_of_pages = ceil($numberOfRows/ $results_per_page);

            if (!isset($_GET['page'])){
                $page = 1;
            }else{
                $page = $_GET['page'];
            }

            $this_page_first_result = ($page - 1) * $results_per_page;


            $sql = "SELECT * FROM item_order ORDER BY order_id ASC LIMIT {$this_page_first_result}, {$results_per_page};";
            $result = mysqli_query($conn, $sql);

            $numberOfRowss = $result->num_rows;

            if ($numberOfRowss > 0){
                ?>
                <table class="table table-striped text-left">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Customer ID</th>
                        <th>Order Item ID</th>
                        <th>Order Item Name</th>
                        <th>Order Item Image</th>
                        <th>Order Quantity</th>
                        <th>Order Total Price</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Order Status</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>{$row['order_id']}</td>";
                        echo "<td>{$row['order_customer_id']}</td>";
                        echo "<td>{$row['order_item_id']}</td>";
                        echo "<td>{$row['order_item_name']}</td>";
                        echo "<td><img src='{$row['order_item_image']}' width='100' height='100'></td>";
                        echo "<td>{$row['order_quantity']}</td>";
                        echo "<td>{$row['order_total_price']}</td>";
                        echo "<td>{$row['address']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['order_status']}</td>";
                        echo "<td><a class='btn btn-warning' href='admin-manage-order-status.php?order_id=$row[order_id]'>Edit Status</a></td>";
                        echo "</tr>";
                    }
            }
            ?>
                    </tbody>
                </table>
        </div>
        <div class="container d-flex justify-content-center">
            <?php

            for($page=1; $page<=$number_of_pages;$page++){
                echo "<a class='btn btn-success next' href='admin-manage-orders.php?page={$page}'> $page </a>";
            }
            ?>
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