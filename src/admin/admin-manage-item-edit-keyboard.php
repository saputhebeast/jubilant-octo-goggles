<?php
require "../resources/config.php";
session_start();

if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
    require "header.php";
    ?>

    <?php
    $keyboard_id = $_GET['keyboard_id'];
    $_SESSION['keyboard_id'] = $keyboard_id;

    $sql = "SELECT * FROM keyboard WHERE keyboard_id = '$keyboard_id';";
    $result = mysqli_query($conn, $sql);
    while($row = $result->fetch_assoc()){
        $keyboard_brand = $row['keyboard_brand'];
        $keyboard_model = $row['keyboard_model'];
        $keyboard_image = $row['keyboard_image'];
        $keyboard_type = $row['keyboard_type'];
        $keyboard_switch_type = $row['keyboard_switch_type'];
        $keyboard_connection_type = $row['keyboard_connection_type'];
        $keyboard_rgb = $row['keyboard_rgb'];
        $keyboard_warranty = $row['keyboard_warranty'];
        $keyboard_depth = $row['keyboard_depth'];
        $keyboard_height = $row['keyboard_height'];
        $keyboard_weight = $row['keyboard_weight'];
        $keyboard_price = $row['keyboard_price'];
        $keyboard_about = $row['keyboard_about'];
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
            <h1 class="text-center">Update Keyboard</h1>
        </div>
        <div class="button-class">
            <a href="admin-manage-item-keyboard.php" class="btn btn-primary">Go back to dashboard</a>
        </div>
        <form action="admin-manage-item-edit-keyboard-submit.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="alert alert-danger"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <label for="">Keyboard ID</label><input class="form-control" type="text" name="keyboard_id" value="<?php echo $keyboard_id?>" readonly><br>
                <label for="">Keyboard Brand: </label><input class="form-control" type="text" name="keyboard_brand" value="<?php echo $keyboard_brand?>"><br>
                <label for="">Keyboard Model: </label><input class="form-control" type="text" name="keyboard_model" value = "<?php echo $keyboard_model?>"><br>
                <label for="">Keyboard Type: </label><input class="form-control" type="text" name="keyboard_type" value="<?php echo $keyboard_type?>"><br>
                <label for="">Keyboard Switch Type: </label><input class="form-control" type="text" name="keyboard_switch_type" value = "<?php echo $keyboard_switch_type?>"><br>
                <label for="">Keyboard Connection Type: </label><input class="form-control" type="text" name="keyboard_connection_type" value="<?php echo $keyboard_connection_type?>"><br>
                <label for="">RGB Lights: </label><input class="form-control" type="text" name="keyboard_rgb" value="<?php echo $keyboard_rgb?>"><br>
                <label for="">Keyboard Warranty: </label><input class="form-control" type="text" name="keyboard_warranty" value="<?php echo $keyboard_warranty?>"><br>
                <label for="">Keyboard Depth: </label><input class="form-control" type="text" name="keyboard_depth" value="<?php echo $keyboard_depth?>"><br>
                <label for="">Keyboard Height: </label><input class="form-control" type="text" name="keyboard_height" value="<?php echo $keyboard_height?>"><br>
                <label for="">Keyboard Weight: </label><input class="form-control" type="text" name="keyboard_weight" value = "<?php echo $keyboard_weight?>"><br>
                <label for="">Keyboard Price: </label><input class="form-control" type="text" name="keyboard_price" value = "<?php echo $keyboard_price?>"><br>
                <label for="">About Keyboard: </label><br><textarea class="form-control" name="keyboard_about" id="" cols="100" rows="10"><?php echo $keyboard_about?></textarea><br>
                <label for="">Keyboard Image: </label><input class="form-control" type="file" name="keyboard_image" value = "<?php echo $keyboard_image?>"><br><?php echo $keyboard_image?>
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