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
    <link rel="stylesheet" href="../styles/admin/admin.css">
    <title>Admin Login</title>
</head>
<body>
    
    <form action="admin-login.php" method="post">
        <!-- error displaying -->
        <h1>Admin Login</h1>
        <div class="container">
            <?php if (isset($_GET['error'])) { ?>
            <p class='error'><?php echo $_GET['error'] ?></p>
            <?php } ?>

            <input type="email" name="email" class="email" placeholder="Email"><br>
            <input type="password" id="password" name="password" class="password" placeholder="Password"><br>
            <input type="checkbox" name="show" class="show" onclick="showHidePassword()"><label for="">Show Password</label><br>
            <input type="submit" value="Submit" class="submit">
        </div>
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