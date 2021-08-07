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
            <h1 class="text-center">Add Laptop</h1>
        </div>
        <div class="button-class">
            <a href="admin-manage-item-laptop.php" class="btn btn-primary">Go back to dashboard</a>
        </div>
        <form action="admin-manage-item-add-laptop-submit.php" method="POST" enctype="multipart/form-data">
            <div class="from-group">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="alert alert-danger"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <label for="">Laptop Brand: </label>
                <input class="form-control" type="text" name="laptop_brand"><br>
                <label for="">Laptop Model: </label>
                <input class="form-control" type="text" name="laptop_model" value = ""><br>
                <label for="">Processor: </label>
                <input class="form-control" type="text" name="processor"><br>
                <label for="">Processor Model: </label>
                <input class="form-control" type="text" name="processor_model" value = ""><br>
                <label for="">GPU: </label>
                <input class="form-control" type="text" name="gpu"><br>
                <label for="">RAM: </label>
                <input class="form-control" type="text" name="ram"><br>
                <label for="">Laptop Storage: </label>
                <input class="form-control" type="text" name="laptop_storage"><br>
                <label for="">Refresh Rate: </label>
                <input class="form-control" type="text" name="refresh_rate"><br>
                <label for="">Display Resolution: </label>
                <input class="form-control" type="text" name="display_resolution"><br>
                <label for="">Display Description: </label>
                <input class="form-control" type="text" name="display_description" value = ""><br>
                <label for="">Weight: </label>
                <input class="form-control" type="text" name="weight" value = ""><br>
                <label for="">Warranty: </label>
                <input class="form-control" type="text" name="warranty" value = ""><br>
                <label for="">Price: </label>
                <input class="form-control" type="text" name="price" value = ""><br>
                <label for="">About Laptop: </label><br>
                <textarea class="form-control" name="about_laptop" id="" cols="100" rows="10"></textarea><br>
                <label for="">Image: </label>
                <input class="form-control" type="file" name="image" value = ""><br>
            </div>
            <input class="btn btn-primary" type="submit" value="Add Laptop">
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














