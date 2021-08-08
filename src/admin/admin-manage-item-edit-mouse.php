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
        <title>Update Mouse</title>
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
    <?php

    $mouse_id = $_GET['mouse_id'];
    $_SESSION['mouse_id'] = $mouse_id;

    $sql = "SELECT * FROM mouse WHERE mouse_id = '$mouse_id';";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        $mouse_brand = $row['mouse_brand'];
        $mouse_model = $row['mouse_model'];
        $mouse_image = $row['mouse_image'];
        $mouse_height = $row['mouse_height'];
        $mouse_width = $row['mouse_width'];
        $mouse_depth = $row['mouse_depth'];
        $mouse_weight = $row['mouse_weight'];
        $mouse_resolution = $row['mouse_resolution'];
        $mouse_durability = $row['mouse_durability'];
        $mouse_price = $row['mouse_price'];
        $mouse_warranty = $row['mouse_warranty'];
        $mouse_description = $row['mouse_description'];
    }

    ?>
    <div class="container">
        <div class="alert-container alert alert-primary" role="alert">
            <h1 class="text-center">Update Mouse</h1>
        </div>
        <div class="button-class">
            <a href="admin-manage-item-mouse.php" class="btn btn-primary">Go back to dashboard</a>
        </div>
        <form action="admin-manage-item-edit-mouse-submit.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="alert alert-danger"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <label for="">Mouse ID</label><input class="form-control" type="text" name="mouse_id" value="<?php echo $mouse_id?>" readonly><br>
                <label for="">Mouse Brand: </label><input class="form-control" type="text" name="mouse_brand" value="<?php echo $mouse_brand?>"><br>
                <label for="">Mouse Model: </label><input class="form-control" type="text" name="mouse_model" value = "<?php echo $mouse_model?>"><br>
                <label for="">Mouse Height: </label><input class="form-control" type="text" name="mouse_height" value = "<?php echo $mouse_height?>"><br>
                <label for="">Mouse Width: </label><input class="form-control" type="text" name="mouse_width" value="<?php echo $mouse_width?>"><br>
                <label for="">Mouse Depth: </label><input class="form-control" type="text" name="mouse_depth" value="<?php echo $mouse_depth?>"><br>
                <label for="">Mouse Weight: </label><input class="form-control" type="text" name="mouse_weight" value="<?php echo $mouse_weight?>"><br>
                <label for="">Mouse Resolution: </label><input class="form-control" type="text" name="mouse_resolution" value="<?php echo $mouse_resolution?>"><br>
                <label for="">Mouse Durability: </label><input class="form-control" type="text" name="mouse_durability" value="<?php echo $mouse_durability?>"><br>
                <label for="">Mouse Price: </label><input class="form-control" type="text" name="mouse_price" value = "<?php echo $mouse_price?>"><br>
                <label for="">Mouse Warranty: </label><input class="form-control" type="text" name="mouse_warranty" value = "<?php echo $mouse_warranty?>"><br>
                <label for="">About Mouse: </label><br><textarea class="form-control" name="mouse_description" id="" cols="100" rows="10"><?php echo $mouse_description?></textarea><br>
                <label for="">Image: </label><input class="form-control" type="file" name="mouse_image" value = "<?php echo $mouse_image?>"><br><?php echo $mouse_image?>
                <small class="form-text text-muted">Make sure to add png file.</small>
            </div>
            <input class="btn btn-primary" type="submit" name="update_mouse" value="Update">
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