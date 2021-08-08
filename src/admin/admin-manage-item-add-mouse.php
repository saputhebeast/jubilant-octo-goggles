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
        <title>Add Mouse</title>
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
            <h1 class="text-center">Add Mouse</h1>
        </div>
        <div class="button-class">
            <a href="admin-manage-item-mouse.php" class="btn btn-primary">Go back to dashboard</a>
        </div>
        <form action="admin-manage-item-add-mouse-submit.php" method="POST" enctype="multipart/form-data">
            <div class="from-group">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="alert alert-danger"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <label for="">Mouse Brand: </label>
                <input class="form-control" type="text" name="mouse_brand"><br>
                <label for="">Mouse Model: </label>
                <input class="form-control" type="text" name="mouse_model" value = ""><br>
                <label for="">Mouse Height: </label>
                <input class="form-control" type="text" name="mouse-height"><br>
                <label for="">Mouse Width: </label>
                <input class="form-control" type="text" name="mouse_width" value = ""><br>
                <label for="">Mouse Depth: </label>
                <input class="form-control" type="text" name="mouse_depth"><br>
                <label for="">Mouse Weight: </label>
                <input class="form-control" type="text" name="mouse_weight"><br>
                <label for="">Mouse Resolution: </label>
                <input class="form-control" type="text" name="mouse_resolution"><br>
                <label for="">Mouse Durability: </label>
                <input class="form-control" type="text" name="mouse_durability"><br>
                <label for="">Mouse Price: </label>
                <input class="form-control" type="text" name="mouse_price"><br>
                <label for="">Mouse Warranty: </label>
                <input class="form-control" type="text" name="mouse_warranty">
                <label for="">About Mouse: </label><br>
                <textarea class="form-control" name="mouse_description" id="" cols="100" rows="10"></textarea><br>
                <label for="">Image: </label>
                <input class="form-control" type="file" name="image" value = ""><br>
            </div>
            <input class="btn btn-primary" type="submit" name="add_mouse" value="Add Mouse">
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