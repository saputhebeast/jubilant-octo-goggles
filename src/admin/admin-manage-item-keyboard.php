<?php
require "../resources/config.php";
session_start();

if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
    require "header.php";
    $sql = "SELECT * FROM keyboard;";
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
        <link rel="stylesheet" href="../styles/admin/admin-dashboard.css">
        <title>Admin-Dashboard</title>
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
            <h1 class="text-center">Manage Item- Keyboard Management</h1>
        </div>
        <div class="button-class">
            <a href="admin-manage-item-add-keyboard.php" class="btn btn-primary">Add Keyboard</a>
        </div>
        <div style="overflow-x:auto;" class="container overflow-auto">
            <?php
            //           echo $numberOfRows;
            $number_of_pages = ceil($numberOfRows/ $results_per_page);

            if (!isset($_GET['page'])){
                $page = 1;
            }else{
                $page = $_GET['page'];
            }

            $this_page_first_result = ($page - 1) * $results_per_page;


            $sql = "SELECT * FROM keyboard ORDER BY keyboard_id ASC LIMIT {$this_page_first_result}, {$results_per_page};";
            $result = mysqli_query($conn, $sql);

            $numberOfRowss = $result->num_rows;

            if ($numberOfRowss > 0) {
            ?>
            <table class="table table-striped text-left">
                <thead>
                <tr>
                    <th>Keyboard ID</th>
                    <th>Keyboard Brand</th>
                    <th>Keyboard Model</th>
                    <th>Keyboard Image</th>
                    <th>Keyboard Type</th>
                    <th>Keyboard Switch Type</th>
                    <th>Keyboard Connection Type</th>
                    <th>Keyboard RGB</th>
                    <th>Keyboard Warranty</th>
                    <th>Keyboard Depth</th>
                    <th>Keyboard Height</th>
                    <th>Keyboard Weight</th>
                    <th>Keyboard Price</th>
                    <th>About Keyboard</th>
                    <th>Update</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['keyboard_id']}</td>";
                    echo "<td>{$row['keyboard_brand']}</td>";
                    echo "<td>{$row['keyboard_model']}</td>";
                    echo "<td><img src='{$row['keyboard_image']}' width=100 height=100></td>";
                    echo "<td>{$row['keyboard_type']}</td>";
                    echo "<td>{$row['keyboard_switch_type']}</td>";
                    echo "<td>{$row['keyboard_connection_type']}</td>";
                    echo "<td>{$row['keyboard_rgb']}</td>";
                    echo "<td>{$row['keyboard_warranty']}</td>";
                    echo "<td>{$row['keyboard_depth']}</td>";
                    echo "<td>{$row['keyboard_height']}</td>";
                    echo "<td>{$row['keyboard_weight']}</td>";
                    echo "<td>{$row['keyboard_price']}</td>";
                    echo "<td>{$row['keyboard_about']}</td>";
                    echo "<td><a class='btn btn-warning' href='admin-manage-item-edit-keyboard.php?keyboard_id=$row[keyboard_id]'>Edit</a><a class='btn btn-danger' href='admin-manage-item-delete-keyboard.php?keyboard_id=$row[keyboard_id]'>Delete</a></td>";
                    echo "</tr>";
                }
                }else{
                ?>
                    <div class="alert alert-warning text-center" role="alert">
                        Please add keyboards!
                    </div>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="container d-flex justify-content-center">
            <?php

            for($page=1; $page<=$number_of_pages;$page++){
                echo "<a class='btn btn-success next' href='admin-manage-item-keyboard.php?page={$page}'> $page </a>";
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

