<?php
    session_start();
    
    if(isset($_SESSION['first_name'])){
        header('Location: admin-dashboard.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h1>Admin Login</h1>
    <form action="admin-login.php" method="post">
        <!-- error displaying -->
        <?php if (isset($_GET['error'])) { ?>
        <p class='error'><?php echo $_GET['error'] ?></p>
        <?php } ?>

        <label for="">Email: </label>
        <input type="email" name="email" id="" placeholder="Email"><br>
        <label for="">Password</label>
        <input type="password" name="password" id="password" placeholder="Password"><br>
        <input type="checkbox" name="show" id="" onclick="showHidePassword()"><label for="">Show Password</label><br>
        <input type="submit" value="Submit">
    </form>
    
    <script>
        function showHidePassword(){
            var val = document.getElementById('password');
            if (val.type === 'password') {
                val.type = 'text';
            }else{
                val.type = 'password';
            }
        }
    </script>
</body>
</html>