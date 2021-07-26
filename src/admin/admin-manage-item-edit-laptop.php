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
        <label for="">Laptop ID: </label><input type="text" name="laptop_id" value = "<?php echo $laptop_id?>" disabled><br>
        <label for="">Laptop Brand: </label>
        <select name="laptop_brand" id="">
            <option value="<?php echo $laptop_brand?>" selected  disabled><?php echo $laptop_brand?></option>
            <option value="Acer">Acer</option>
            <option value="Asus">Asus</option>
            <option value="MSI">MSI</option>
        </select><br>
        <label for="">Laptop Model: </label><input type="text" name="laptop_model" value = "<?php echo $laptop_model?>"><br>
        <label for="">Processor: </label>
        <select name="processor" id="">
            <option value="<?php echo $processor?>" selected disabled><?php echo $processor?></option>
            <option value="AMD Ryzen 7">AMD Ryzen 7</option>
            <option value="AMD Ryzen 9">AMD Ryzen 9</option>
            <option value="Intel Core i5">Intel Core i5</option>
            <option value="Intel Core i7">Intel Core i7</option>
            <option value="Intel Core i9">Intel Core i9</option>
        </select>
        <br>
        <label for="">Processor Model: </label><input type="text" name="processor_model" value = "<?php echo $processor_model?>"><br>
        <label for="">GPU: </label>
        <select name="gpu" id="">
            <option value="<?php echo $gpu?>" selected disabled><?php echo $gpu?></option>
            <option value="GTX 1650 4GB GDDR6">GTX 1650 4GB GDDR6</option>
            <option value="GTX 1650Ti 4GB GDDR6">GTX 1650Ti 4GB GDDR6</option>
            <option value="GTX 1660Ti with Max-Q Design GDDR6">GTX 1660Ti with Max-Q Design GDDR6</option>
            <option value="RTX 2060 6GB GDDR6">RTX 2060 6GB GDDR6</option>
            <option value="RTX 3060 6GB GDDR6">RTX 3060 6GB GDDR6</option>
            <option value="RTX 3060 Max-Q 6GB GDDR6">RTX 3060 Max-Q 6GB GDDR6</option>
            <option value="RTX 3070 8GB GDDR6">RTX 3070 8GB GDDR6</option>
            <option value="RTX 3070 Max-Q 8GB GDDR">RTX 3070 Max-Q 8GB GDDR</option>
            <option value="RTX 3080 16GB GDDR6">RTX 3080 16GB GDDR6</option>
        </select><br>
        <label for="">RAM: </label>
        <select name="ram" id="">
            <option value="<?php echo $ram?>" disabled selected><?php echo $ram?></option>
            <option value="8GB DDR4 2933MHz">8GB DDR4 2933MHz</option>
            <option value="8GB DDR4 3200MHz">8GB DDR4 3200MHz</option>
            <option value="16GB DDR4 2933MHz">16GB DDR4 2933MHz</option>
            <option value="16GB DDR4 3200MHz">16GB DDR4 3200MHz</option>
            <option value="32GB DDR4 3200MHz">32GB DDR4 3200MHz</option>
        </select><br>
        <label for="">Laptop Storage: </label>
        <select name="laptop_storage" id="">
            <option value="<?php echo $laptop_storage?>" selected disabled><?php echo $laptop_storage?></option>
            <option value="512GB M.2 NVME SSD">512GB M.2 NVME SSD</option>
            <option value="1TB M.2 NVME SSD">1TB M.2 NVME SSD</option>
            <option value="2TB M.2 NVME SSD">2TB M.2 NVME SSD</option>
        </select><br>
        <label for="">Refresh Rate: </label>
        <select name="refresh_rate" id="">
            <option value="<?php echo $refresh_rate?>" selected disabled><?php echo $refresh_rate?></option>
            <option value="60Hz">60Hz</option>
            <option value="120Hz">120Hz</option>
            <option value="144Hz">144Hz</option>
            <option value="240Hz">240Hz</option>
            <option value="300Hz">300Hz</option>
        </select><br>
        <label for="">Display Resolution: </label>
        <select name="display_resolution" id="">
            <option value="<?php echo $display_resolution?>" selected required><?php echo $display_resolution?></option>
            <option value="1920 x 1080">1920 x 1080</option>
            <option value="2560 x 1440">2560 x 1440</option>
            <option value="3840 x 2160">3840 x 2160</option>
        </select><br>
        <label for="">Display Description: </label><input type="text" name="display_description" value = "<?php echo $display_description?>"><br>
        <label for="">Weight: </label><input type="text" name="weight" value = "<?php echo $weight?>"><br>
        <label for="">Warranty: </label><input type="text" name="warranty" value = "<?php echo $warranty?>"><br>
        <label for="">Price: </label><input type="text" name="price" value = "<?php echo $price?>"><br>
        <label for="">About Laptop: </label><br><textarea name="about_laptop" id="" cols="100" rows="10"><?php echo $about_laptop?></textarea><br>
        <label for="">Image: </label><input type="file" name="image" value = "<?php echo $image?>"><br>
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