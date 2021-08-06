<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
        require "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <h1 class="text-center">Change Account Password</h1>
        </div>
        <div class="button-class">
            <a href="admin-manage.php" class="btn btn-primary">Go back to dashboard</a>
        </div>
        <form action="admin-manage-password-submit.php" method="POST">
            <div class="form-group">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="alert alert-danger text-center"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <label for="old-password">Old Password</label>
                <input class="form-control" type="password" name="old-password" id=""><br>
                <label for="new-password">New Password</label>
                <input class="form-control" type="password" name="new-password" id=""><br>
                <label for="confirm-new-password">Confirm New Password</label>
                <input class="form-control" type="password" name="confirm-new-password" id=""><br>
                <input class="btn btn-secondary" type="submit" value="Change Password">
            </div>
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