<?php require "../resources/config.php"; ?>

<?php
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
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse">
        <a class="navbar-brand" href="admin-dashboard.php">Dashboard</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="admin-manage.php">Manage Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin-manage-user.php">Manage User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin-manage-item.php">Manage Item</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin-manage-orders.php">Manage Orders</a>
            </li>
        </ul>
        <ul class="navbar-nav form-inline my-2 my-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="admin-logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<?php
    }else{
        header("Location: admin-login.php");
    }?>