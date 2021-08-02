<?php
    require "../resources/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>
<body>
    <style>
        .container{
            margin: 30px;
        }
        .submit a:hover{
            text-decoration: none;
        }
    </style>
    <?php require "header.php"?>

    <div class="container form">
        <?php if (isset($_GET['error'])) { ?>
            <p class="alert alert-danger text-center"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <form action="user-login-submit.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group submit">
                <button type="submit" class="btn btn-primary">Login</button>
                <a class="text-primary" href="user-signup.php" style="float: right">I don't have a account.</a>
            </div>
        </form>
    </div>

</body>
</html>