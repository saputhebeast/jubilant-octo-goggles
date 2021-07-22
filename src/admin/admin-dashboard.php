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
    <link rel="stylesheet" href="/jubilant-octo-goggles/styles/admin-dashboard.css">
    <title>Admin-Dashboard</title>
</head>
<body>
    <a href = "admin-logout.php">Logout</a>
    <a href = "#">Add admin</a>

    <h1>Hello, <?php echo $_SESSION['first_name']." ".$_SESSION['last_name']; ?></h1>
    
    <script>
        history.forward(1);
    </script>
</body>
</html>
<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>

