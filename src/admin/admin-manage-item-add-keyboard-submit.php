<?php
require "../resources/config.php";
session_start();

if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
    ?>

    <?php
    $keyboard_brand = $_POST['keyboard_brand'];
    $keyboard_model = $_POST['keyboard_model'];
    $keyboard_image = $_FILES['image'];
    $keyboard_type = $_POST['keyboard_type'];
    $keyboard_switch_type = $_POST['keyboard_switch_type'];
    $keyboard_connection_type = $_POST['keyboard_connection_type'];
    $keyboard_rgb = $_POST['keyboard_rgb'];
    $keyboard_warranty = $_POST['keyboard_warranty'];
    $keyboard_depth = $_POST['keyboard_depth'];
    $keyboard_height = $_POST['keyboard_height'];
    $keyboard_weight = $_POST['keyboard_weight'];
    $keyboard_price = $_POST['keyboard_price'];
    $keyboard_about = $_POST['keyboard_about'];

    $target = "../images/keyboard/".basename($_FILES['image']['name']);
    $imageFileType = strtolower(pathinfo($target,PATHINFO_EXTENSION));

    if (empty($keyboard_brand) | empty($keyboard_model) | empty($keyboard_type) | empty($keyboard_switch_type) | empty($keyboard_connection_type) | empty($keyboard_rgb) | empty($keyboard_warranty) | empty($keyboard_depth) | empty($keyboard_height) | empty($keyboard_weight) | empty($keyboard_price) | strlen($keyboard_about)== 0) {
        header("Location: admin-manage-item-add-keyboard.php?error=empty blanks not valid");
        exit();
    }elseif($_FILES['image']['error'] !== UPLOAD_ERR_OK){
        header("Location: admin-manage-item-add-keyboard.php?error=you need to add image");
        exit();
    }elseif(file_exists($target)){
        header("Location: admin-manage-item-add-keyboard.php?error=file already exists");
        exit();
    }elseif ($_FILES["image"]["size"] > 500000) {
        header("Location: admin-manage-item-add-keyboard.php?error=too large file");
        exit();
    }
    elseif ($imageFileType != "png") {
        header("Location: admin-manage-item-add-keyboard.php?error=only png files are allowed");
        exit();
    }else{
        move_uploaded_file($_FILES["image"]["tmp_name"], $target);

        $sql = "INSERT INTO keyboard(keyboard_brand, keyboard_model, keyboard_image, keyboard_type, keyboard_switch_type, keyboard_connection_type, keyboard_rgb, keyboard_warranty, keyboard_depth, keyboard_height, keyboard_weight, keyboard_price, keyboard_about) 
VALUES ('$keyboard_brand' ,'$keyboard_model', '$target', '$keyboard_type', '$keyboard_switch_type', '$keyboard_connection_type', '$keyboard_rgb', '$keyboard_warranty', '$keyboard_depth', '$keyboard_height', '$keyboard_weight', '$keyboard_price', '$keyboard_about');";
        mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) > 0) {
            echo "<script type='text/javascript'>";
            echo "alert('Keyboard Added Successfully');";
            echo "window.location.href = 'admin-manage-item-keyboard.php'";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('Keyboard Not Added Successfully');";
            echo "window.location.href = 'admin-manage-item-keyboard.php'";
            echo "</script>";
        }
    }
    ?>
    <?php
}else{
    header("Location: admin.php");
    exit();
}
?>