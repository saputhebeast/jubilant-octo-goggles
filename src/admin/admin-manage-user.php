<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
        require "header.php";
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
    </style>
    <div class="container">
        <div class="alert-container alert alert-primary" role="alert">
            <h1 class="text-center">Manage User</h1>
        </div>
        <div class="button-class">
            <a href="admin-manage-user-add.php" class="btn btn-primary">Add User</a>
        </div>
        <table class="table table-striped text-left">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Street Address</th>
                    <th>City</th>
                    <th>Postal Code</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM customer ORDER BY customer_id ASC;";
                $result = mysqli_query($conn, $sql);

                $numberOfRows = $result->num_rows;
                if ($numberOfRows > 0) {
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>{$row['customer_id']}</td>";
                        echo "<td>{$row['first_name']}</td>";
                        echo "<td>{$row['last_name']}</td>";
                        echo "<td>{$row['street_address']}</td>";
                        echo "<td>{$row['city']}</td>";
                        echo "<td>{$row['postal_code']}</td>";
                        echo "<td>{$row['phone']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td><a class='btn btn-warning' href='admin-manage-user-edit.php?customer_id=$row[customer_id]'>Edit</a><a class='btn btn-secondary' href='admin-manage-user-password.php?customer_id=$row[customer_id]'>Change Password</a><a class='btn btn-danger' href='admin-manage-user-delete.php?customer_id=$row[customer_id]'>Delete</a></td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>

