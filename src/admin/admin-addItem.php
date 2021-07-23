<?php
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
        <a href="admin-addItem.php" class="active">Add Item</a>
        <div class="nav-right">
            <a href="admin-logout.php">Logout</a>
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
