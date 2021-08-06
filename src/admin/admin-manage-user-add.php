<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
        require "header.php";
?>

<?php
    require "../resources/config.php";

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
        form{
            margin-bottom: 30px;
        }
    </style>
    <div class="container">
        <div class="alert-container alert alert-primary" role="alert">
            <h1 class="text-center">Add User</h1>
        </div>
        <div class="button-class">
            <a href="admin-manage-user.php" class="btn btn-primary">Go back to dashboard</a>
        </div>
        <form action="admin-manage-user-add-submit.php" method="POST">
            <div class="form-group">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="alert alert-danger"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <label for="">First Name: </label>
                <input class="form-control" type="text" name="first_name" value = ""><br>
                <label for="">Last Name: </label>
                <input class="form-control" type="text" name="last_name" value = ""><br>
                <label for="">Street Address: </label>
                <input class="form-control" type="text" name="street" value = ""><br>
                <label for="">City: </label>
                <input class="form-control" type="text" name="city" value = ""><br>
                <label for="">Postal Code: </label>
                <input class="form-control" type="text" name="postal_code" value = ""><br>
                <label for="">Phone: </label>
                <input class="form-control" type="text" name="phone" value = ""><br>
                <label for="">Email: </label>
                <input class="form-control" type="email" name="email" value = ""><br>
                <label for="">Password: </label>
                <input class="form-control" type="password" name="password" value = ""><br>
                <label for="">Confirm Password: </label>
                <input class="form-control" type="password" name="re-password" value = ""><br>
            </div>
            <input class="btn btn-primary" type="submit" value="Add Customer">
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