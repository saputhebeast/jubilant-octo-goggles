<?php
    session_start();
    require "../resources/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>
<body>
    <form action="user-login-submit.php" method="POST">
        <?php if (isset($_GET['error'])) { ?>
            <p class='error'><?php echo $_GET['error'] ?></p>
        <?php } ?>
        <label for="">Username: </label><input type="email" name="email" id=""><br>
        <label for="">Password: </label><input type="password" name="password" id=""><br>
        <input type="submit" value="Login">
    </form>
    <a href="user-signup.php">I don't have a account.</a>
</body>
</html>