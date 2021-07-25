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
        <a href="admin-manage.php">Manage Admin</a>
        <a href="admin-manage-user.php">Manage User</a>
        <a href="admin-manage-item.php" class="active">Manage Item</a>
        <a href="#">Orders</a>
        <div class="nav-right">
            <a href="admin-logout.php">Logout</a>
        </div>
    </div>
    
    <h1>Manage Item- Laptop Management</h1>
    <a href="admin-manage-item-add-laptop.php">add laptop</a>
    
    <table border=1>
        <tr>
            <th>Laptop ID</th>
            <th>Laptop Brand</th>
            <th>Laptop Model</th>
            <th>Image</th>
            <th>Processor</th>
            <th>Processor Model</th>
            <th>GPU</th>
            <th>RAM</th>
            <th>Laptop Storage</th>
            <th>Refresh Rate</th>
            <th>Display Resolution</th>
            <th>Display Description</th>
            <th>Weight</th>
            <th>Warranty</th>
            <th>Price</th>
            <th>About Laptop</th>
            <th>Update</th>
        </tr>
        <?php
            $sql = "SELECT * FROM laptop ORDER BY laptop_id ASC;";
            $result = mysqli_query($conn, $sql);

            $numberOfRows = $result->num_rows;
            if ($numberOfRows > 0) {
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>{$row['laptop_id']}</td>";
                    echo "<td>{$row['laptop_brand']}</td>";
                    echo "<td>{$row['laptop_model']}</td>";
                    echo "<td><img src='{$row['image']}' width=200 height=200></td>";
                    echo "<td>{$row['processor']}</td>";
                    echo "<td>{$row['processor_model']}</td>";
                    echo "<td>{$row['gpu']}</td>";
                    echo "<td>{$row['ram']}</td>";
                    echo "<td>{$row['laptop_storage']}</td>";
                    echo "<td>{$row['refresh_rate']}</td>";
                    echo "<td>{$row['display_resolution']}</td>";
                    echo "<td>{$row['display_description']}</td>";
                    echo "<td>{$row['weight']}</td>";
                    echo "<td>{$row['warranty']}</td>";
                    echo "<td>{$row['price']}</td>";
                    echo "<td>{$row['about_laptop']}</td>";
                    echo "<td><a href=#?laptop_id=$row[laptop_id]'>Edit</a> | <a href='#?laptop_id=$row[laptop_id]'>Delete</a></td>";
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

