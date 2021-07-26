<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>

<?php
    $laptop_id = $_GET['laptop_id'];
    $_SESSION['laptop_id'] = $laptop_id;
    
    $sql = "SELECT * FROM laptop WHERE laptop_id = '$laptop_id'";
    $result = mysqli_query($conn, $sql);
    while($row = $result->fetch_assoc()){
        $laptop_brand = $row['laptop_brand'];
        $laptop_model = $row['laptop_model'];
        $image = $row['image'];
        $processor = $row['processor'];
        $processor_model = $row['processor_model'];
        $gpu = $row['gpu'];
        $ram = $row['ram'];
        $laptop_storage = $row['laptop_storage'];
        $refresh_rate = $row['refresh_rate'];
        $display_resolution = $row['display_resolution'];
        $display_description = $row['display_description'];
        $weight = $row['weight'];
        $warranty = $row['warranty'];
        $price = $row['price'];
        $about_laptop = $row['about_laptop'];
    }
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
    <a href="admin-manage-item.php">Go back to dashboard</a>
    <form action="admin-manage-item-edit-laptop-submit.php" method="POST" enctype="multipart/form-data">
        <h1>Make sure to add png file</h1>
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
        <input type="submit" value="Update">
    </form>
</body>
</html>

<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>