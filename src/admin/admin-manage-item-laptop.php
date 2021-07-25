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
    <title>Add Laptop</title>
</head>
<body>
    <a href="admin-manage-item.php">Go back to manage item</a>
    <form action="#" method="POST">
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label for="">Laptop Brand: </label><input type="text" name="laptop_brand" value = ""><br>
        <label for="">Laptop Model: </label><input type="text" name="laptop_model" value = ""><br>
        <label for="">Image: </label><input type="file" name="image" value = ""><br>
        <label for="">Processor: </label><input type="password" name="password" value = ""><br>
        <label for="">Processor Model: </label><input type="password" name="re-password" value = ""><br>
        <label for="">GPU: </label><input type="password" name="re-password" value = ""><br>
        <label for="">RAM: </label><input type="password" name="re-password" value = ""><br>
        <label for="">Laptop Storage: </label><input type="password" name="re-password" value = ""><br>
        <label for="">Refresh Rate: </label><input type="password" name="re-password" value = ""><br>
        <label for="">Display Resolution: </label><input type="password" name="re-password" value = ""><br>
        <label for="">Display Description: </label><input type="password" name="re-password" value = ""><br>
        <label for="">Display Description: </label><input type="password" name="re-password" value = ""><br>
        <label for="">Weight: </label><input type="password" name="re-password" value = ""><br>
        <label for="">Warranty: </label><input type="password" name="re-password" value = ""><br>
        <label for="">Price: </label><input type="password" name="re-password" value = ""><br>
        <label for="">About Laptop: </label><input type="password" name="re-password" value = ""><br>
        <input type="submit" value="Add Laptop">
    </form>
</body>
</html>

<!-- laptop_id
laptop_brand
laptop_model
image
processor
processor_model
gpu
ram
laptop_storage
refresh_rate
display_resolution
display_description
weight
warranty
price
about_laptop -->


<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>