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
            <h1 class="text-center">Add Keyboard</h1>
        </div>
        <div class="button-class">
            <a href="admin-manage-item-keyboard.php" class="btn btn-primary">Go back to dashboard</a>
        </div>
        <form action="admin-manage-item-add-keyboard-submit.php" method="POST" enctype="multipart/form-data">
            <div class="from-group">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="alert alert-danger"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <label for="">Keyboard Brand: </label>
                <input class="form-control" type="text" name="keyboard_brand"><br>
                <label for="">Keyboard Model: </label>
                <input class="form-control" type="text" name="keyboard_model" value = ""><br>
                <label for="">Keyboard Type: </label>
                <input class="form-control" type="text" name="keyboard_type"><br>
                <label for="">Switches Type: </label>
                <input class="form-control" type="text" name="keyboard_switch_type" value = ""><br>
                <label for="">Connection Type: </label>
                <input class="form-control" type="text" name="keyboard_connection_type"><br>
                <label for="">RGB Lights: </label>
                <input class="form-control" type="text" name="keyboard_rgb"><br>
                <label for="">Keyboard Warranty: </label>
                <input class="form-control" type="text" name="keyboard_warranty"><br>
                <label for="">Keyboard Depth: </label>
                <input class="form-control" type="text" name="keyboard_depth"><br>
                <label for="">Keyboard Height: </label>
                <input class="form-control" type="text" name="keyboard_height"><br>
                <label for="">Keyboard Weight: </label>
                <input class="form-control" type="text" name="keyboard_weight" value = ""><br>
                <label for="">Keyboard Price: </label>
                <input class="form-control" type="text" name="keyboard_price" value = ""><br>
                <label for="">About Keyboard: </label><br>
                <textarea class="form-control" name="keyboard_about" id="" cols="100" rows="10"></textarea><br>
                <label for="">Keyboard Image: </label>
                <input class="form-control" type="file" name="image" value = ""><br>
            </div>
            <input class="btn btn-primary" type="submit" value="Add Keyboard">
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














