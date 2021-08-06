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
    </style>
    <div class="container">
        <div class="alert-container alert alert-primary" role="alert">
            <h1 class="text-center">Edit Admin Details</h1>
        </div>
        <div class="button-class">
            <a href="admin-manage.php" class="btn btn-primary">Go back to dashboard</a>
        </div>
        <form action="admin-manage-edit-submit.php" method="POST">
            <div class="form-group">
                <label for="">Admin ID: </label>
                <input class="form-control" type="text" name="admin_id" value = "<?php echo $admin_id?>" disabled><br>
                <label for="">First Name: </label>
                <input class="form-control" type="text" name="first_name" value = "<?php echo $first_name?>"><br>
                <label for="">Last Name: </label>
                <input class="form-control" type="text" name="last_name" value = "<?php echo $last_name?>"><br>
                <label for="">Email: </label>
                <input class="form-control" type="email" name="email" value = "<?php echo $email?>"><br>
            </div>
            <input type="submit" value="Update" class="btn btn-warning">
        </form>
    </div>
</body>
</html>

<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>