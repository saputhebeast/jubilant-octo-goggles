<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
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
    <div class="nav">
        <a href="admin-dashboard.php">Dashboard</a>
        <a href="admin-manage.php" class="active">Manage Admin</a>
        <a href="admin-addItem.php">Manage Item</a>
        <a href="admin-manage-user.php">Manage User</a>
        <div class="nav-right">
            <a href="admin-logout.php">Logout</a>
        </div>
    </div>
    <h1>Admin Manage</h1>
    <a href="admin-manage-add.php">Add Admin</a>
    <table border=1>
        <tr>
            <th>Admin ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Update</th>
        </tr>
        <?php
            $sql = "SELECT * FROM admin ORDER BY admin_id ASC;";
            $result = mysqli_query($conn, $sql);

            $numberOfRows = $result->num_rows;
            if ($numberOfRows > 0) {
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>{$row['admin_id']}</td>";
                    echo "<td>{$row['first_name']}</td>";
                    echo "<td>{$row['last_name']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td><a href='admin-manage-edit.php?admin_id=$row[admin_id]'>Edit</a> | <a href='admin-manage-password.php?admin_id=$row[admin_id]'>Change Password</a> | <a href='admin-manage-delete.php?admin_id=$row[admin_id]'>Delete</a></td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>

</body>
</html>
<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>

