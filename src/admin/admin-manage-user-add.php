<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
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
    <a href="admin-manage-user.php">Go back to dashboard</a>
    <form action="admin-manage-user-add-submit.php" method="POST">
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label for="">First Name: </label><input type="text" name="first_name" value = ""><br>
        <label for="">Last Name: </label><input type="text" name="last_name" value = ""><br>
        <label for="">Street Address: </label><input type="text" name="street" value = ""><br>
        <label for="">City: </label><input type="text" name="city" value = ""><br>
        <label for="">Postal Code: </label><input type="text" name="postal_code" value = ""><br>
        <label for="">Phone: </label><input type="text" name="phone" value = ""><br>
        <label for="">Email: </label><input type="email" name="email" value = ""><br>
        <label for="">Password: </label><input type="password" name="password" value = ""><br>
        <label for="">Confirm Password: </label><input type="password" name="re-password" value = ""><br>
        <input type="submit" value="Add Customer">
    </form>
</body>
</html>

<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>