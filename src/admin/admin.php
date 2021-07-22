<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Login</h1>
    <form action="admin-login.php" method="post">
        Email: <input type="email" name="email" id="" placeholder="Email" required><br>
        Password: <input type="password" name="password" id="" placeholder="Password" required><br>
        <input type="submit" value="Submit">
    </form>







    
<!-- 
    <?php 
    $hash = password_hash("jason123", PASSWORD_DEFAULT); 
    echo $hash.'<br>';
    if (password_verify('jason123', $hash)) {
        echo 'Password is same!';
    } else {
        echo 'Invalid password.';
    }
    
    ?>
    -->

</body>
</html>