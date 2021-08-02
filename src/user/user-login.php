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
    <?php require "header.php"?>
    <div class="container">
        <form action="user-login-submit.php" method="POST">
            <?php if (isset($_GET['error'])) { ?>
                <p class='error'><?php echo $_GET['error'] ?></p>
            <?php } ?>
            <label for="">Username: </label><input type="email" name="email" id=""><br>
            <label for="">Password: </label><input type="password" name="password" id=""><br>
            <input type="submit" value="Login">
        </form>
        <a href="user-signup.php">I don't have a account.</a>
    </div>
</body>
</html>