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
    <title>Add Laptop</title>
</head>
<body>
    <a href="admin-manage-item.php">Go back to manage item</a>
    <form action="admin-manage-item-add-laptop-submit.php" method="POST" enctype="multipart/form-data">
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label for="">Laptop Brand: </label><input type="text" name="laptop_brand"><br>
        <label for="">Laptop Model: </label><input type="text" name="laptop_model" value = ""><br>
        <label for="">Processor: </label><input type="text" name="processor"><br>
        <label for="">Processor Model: </label><input type="text" name="processor_model" value = ""><br>
        <label for="">GPU: </label><input type="text" name="gpu"><br>
        <label for="">RAM: </label><input type="text" name="ram"><br>
        <label for="">Laptop Storage: </label><input type="text" name="laptop_storage"><br>
        <label for="">Refresh Rate: </label><input type="text" name="refresh_rate"><br>
        <label for="">Display Resolution: </label><input type="text" name="display_resolution"><br>
        <label for="">Display Description: </label><input type="text" name="display_description" value = ""><br>
        <label for="">Weight: </label><input type="text" name="weight" value = ""><br>
        <label for="">Warranty: </label><input type="text" name="warranty" value = ""><br>
        <label for="">Price: </label><input type="text" name="price" value = ""><br>
        <label for="">About Laptop: </label><br><textarea name="about_laptop" id="" cols="100" rows="10"></textarea><br>
        <label for="">Image: </label><input type="file" name="image" value = ""><br>
        <input type="submit" value="Add Laptop">
    </form>
</body>
</html>

<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>














