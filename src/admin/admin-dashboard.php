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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Admin-Dashboard</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <a class="navbar-brand" href="#">Dashboard</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <ul class="navbar-nav form-inline my-2 my-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
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

