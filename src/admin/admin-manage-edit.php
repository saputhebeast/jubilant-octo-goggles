<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
        require "header.php";
?>

<?php
    require "../resources/config.php";

    $admin_id = $_GET['admin_id'];
    $_SESSION['admin_id'] = $admin_id;
    
    $sql = "SELECT * FROM admin WHERE admin_id = $admin_id";
    $result = mysqli_query($conn, $sql);
    while($row = $result->fetch_assoc()){
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Records</title>
</head>
<body>
    <a href="admin-manage.php">Go back to dashboard</a>
    <form action="admin-manage-edit-submit.php" method="POST">
        <label for="">Admin ID: </label><input type="text" name="admin_id" value = "<?php echo $admin_id?>" disabled><br>
        <label for="">First Name: </label><input type="text" name="first_name" value = "<?php echo $first_name?>"><br>
        <label for="">Last Name: </label><input type="text" name="last_name" value = "<?php echo $last_name?>"><br>
        <label for="">Email: </label><input type="email" name="email" value = "<?php echo $email?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>

<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>