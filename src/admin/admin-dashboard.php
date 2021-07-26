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
        <a href="admin-dashboard.php" class="active">Dashboard</a>
        <a href="admin-manage.php">Manage Admin</a>
        <a href="admin-manage-user.php">Manage User</a>
        <a href="admin-manage-item.php">Manage Item</a>
        <a href="#">Orders</a>
        <div class="nav-right">
            <a href="admin-logout.php">Logout</a>
        </div>
    </div>
    
    <h1>Hello, <?php echo $_SESSION['first_name']." ".$_SESSION['last_name']; ?></h1>

    <?php 
        $admins = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin"));
        $users = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM customer"));
        $laptops = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM laptop"));
    
        echo "<h1>Overview</h1>";
        echo "<h2>Number of Admins: {$admins}</h2>";
        echo "<h2>Number of Users: {$users}</h2>";
        echo "<h2>Number of Laptops: {$laptops}</h2>";
    ?>

</body>
</html>
<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>

