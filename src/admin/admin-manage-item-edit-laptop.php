<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
        require "header.php";
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
    <style>
        .container{
            margin-top: 30px;
        }
        .alert-container{
            margin-bottom: 30px;
        }
        .button-class{
            margin-bottom: 30px;
        }
        form{
            margin-bottom: 30px;
        }
    </style>
    <div class="container">
        <div class="alert-container alert alert-primary" role="alert">
            <h1 class="text-center">Update Laptop</h1>
        </div>
        <div class="button-class">
            <a href="admin-manage-item.php" class="btn btn-primary">Go back to dashboard</a>
        </div>
        <form action="admin-manage-item-edit-laptop-submit.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Laptop ID</label><input class="form-control" type="text" name="laptop_id" value="<?php echo $laptop_id?>" readonly><br>
                <label for="">Laptop Brand: </label><input class="form-control" type="text" name="laptop_brand" value="<?php echo $laptop_brand?>"><br>
                <label for="">Laptop Model: </label><input class="form-control" type="text" name="laptop_model" value = "<?php echo $laptop_model?>"><br>
                <label for="">Processor: </label><input class="form-control" type="text" name="processor" value="<?php echo $processor?>"><br>
                <label for="">Processor Model: </label><input class="form-control" type="text" name="processor_model" value = "<?php echo $processor_model?>"><br>
                <label for="">GPU: </label><input class="form-control" type="text" name="gpu" value="<?php echo $gpu?>"><br>
                <label for="">RAM: </label><input class="form-control" type="text" name="ram" value="<?php echo $ram?>"><br>
                <label for="">Laptop Storage: </label><input class="form-control" type="text" name="laptop_storage" value="<?php echo $laptop_storage?>"><br>
                <label for="">Refresh Rate: </label><input class="form-control" type="text" name="refresh_rate" value="<?php echo $refresh_rate?>"><br>
                <label for="">Display Resolution: </label><input class="form-control" type="text" name="display_resolution" value="<?php echo $display_resolution?>"><br>
                <label for="">Display Description: </label><input class="form-control" type="text" name="display_description" value = "<?php echo $display_description?>"><br>
                <label for="">Weight: </label><input class="form-control" type="text" name="weight" value = "<?php echo $weight?>"><br>
                <label for="">Warranty: </label><input class="form-control" type="text" name="warranty" value = "<?php echo $warranty?>"><br>
                <label for="">Price: </label><input class="form-control" type="text" name="price" value = "<?php echo $price?>"><br>
                <label for="">About Laptop: </label><br><textarea class="form-control" name="about_laptop" id="" cols="100" rows="10"><?php echo $about_laptop?></textarea><br>
                <label for="">Image: </label><input class="form-control" type="file" name="image" value = "<?php echo $image?>"><br><?php echo $image?>
                <small class="form-text text-muted">Make sure to add png file.</small>
            </div>
            <input class="btn btn-primary" type="submit" value="Update">
        </form>
    </div>

</body>
</html>

<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>