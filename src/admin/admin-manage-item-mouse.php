<?php
require "../resources/config.php";
session_start();

if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
    require "header.php";
    if(mysqli_query($conn, "SELECT * FROM mouse")){$numberOfRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM mouse"));}else{$numberOfRows = 0;}
    $results_per_page = 5;
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/admin/admin-dashboard.css">
        <title>Mice Manage</title>
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
            <h1 class="text-center">Manage Item- Mice Management</h1>
        </div>
        <div class="button-class">
            <a href="admin-manage-item-add-mouse.php" class="btn btn-primary">Add Mouse</a>
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


            $sql = "SELECT * FROM mouse ORDER BY mouse_id ASC LIMIT {$this_page_first_result}, {$results_per_page};";
            $result = mysqli_query($conn, $sql);

            if($result){
                $numberOfRowss = $result->num_rows;
            }
            else{
                $numberOfRowss = 0;
            }


            if ($numberOfRowss > 0) {
            ?>
            <table class="table table-striped text-left">
                <thead>
                <tr>
                    <th>Mouse ID</th>
                    <th>Mouse Brand</th>
                    <th>Mouse Model</th>
                    <th>Mouse Image</th>
                    <th>Mouse Height</th>
                    <th>Mouse Width</th>
                    <th>Mouse Depth</th>
                    <th>Mouse Weight</th>
                    <th>Mouse Resolution</th>
                    <th>Mouse Durability</th>
                    <th>Mouse Price</th>
                    <th>Mouse Warranty</th>
                    <th>Mouse Description</th>
                    <th>Update</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['mouse_id']}</td>";
                    echo "<td>{$row['mouse_brand']}</td>";
                    echo "<td>{$row['mouse_model']}</td>";
                    echo "<td><img src='{$row['mouse_image']}' width=100 height=100></td>";
                    echo "<td>{$row['mouse_height']}</td>";
                    echo "<td>{$row['mouse_width']}</td>";
                    echo "<td>{$row['mouse_depth']}</td>";
                    echo "<td>{$row['mouse_weight']}</td>";
                    echo "<td>{$row['mouse_durability']}</td>";
                    echo "<td>{$row['mouse_price']}</td>";
                    echo "<td>{$row['mouse_warranty']}</td>";
                    echo "<td>{$row['mouse_description']}</td>";
                    echo "<td><a class='btn btn-warning' href='#php?mouse_id=$row[mouse_id]'>Edit</a><a class='btn btn-danger' href='#?mouse_id=$row[mouse_id]'>Delete</a></td>";
                    echo "</tr>";
                }
                }else{
                    ?>
                    <div class="alert alert-warning text-center" role="alert">
                        Please add mice!
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
                echo "<a class='btn btn-success next' href='admin-manage-item-mouse.php?page={$page}'> $page </a>";
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

