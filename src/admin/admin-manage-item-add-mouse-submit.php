<?php
require "../resources/config.php";
session_start();

if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
    ?>

    <?php
    if (isset($_POST['add_mouse'])) {
        $mouse_brand = $_POST['mouse_brand'];
        $mouse_model = $_POST['mouse_model'];
        $mouse_image = $_FILES['image'];
        $mouse_height = $_POST['mouse_height'];
        $mouse_width = $_POST['mouse_width'];
        $mouse_depth = $_POST['mouse_depth'];
        $mouse_weight = $_POST['mouse_weight'];
        $mouse_resolution = $_POST['mouse_resolution'];
        $mouse_durability = $_POST['mouse_durability'];
        $mouse_price = $_POST['mouse_price'];
        $mouse_warranty = $_POST['mouse_warranty'];
        $mouse_description = $_POST['mouse_description'];

        $target = "../images/mouse/" . basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));

    if (empty($mouse_brand) | empty($mouse_model) | empty($mouse_height) | empty($mouse_width) | empty($mouse_depth) | empty($mouse_weight) | empty($mouse_resolution) | empty($mouse_durability) | empty($mouse_price) | empty($mouse_warranty) | strlen($mouse_description)== 0) {
        header("Location: admin-manage-item-add-mouse.php?error=empty blanks not valid");
        exit();
    }elseif($_FILES['image']['error'] !== UPLOAD_ERR_OK){
        header("Location: admin-manage-item-add-mouse.php?error=you need to add image");
        exit();
    }elseif(file_exists($target)){
        header("Location: admin-manage-item-add-mouse.php?error=file already exists");
        exit();
    }elseif ($_FILES["image"]["size"] > 500000) {
        header("Location: admin-manage-item-add-mouse.php?error=too large file");
        exit();
    }
    elseif ($imageFileType != "png") {
        header("Location: admin-manage-item-add-mouse.php?error=only png files are allowed");
        exit();
    }else{
        $sql = "INSERT INTO mouse(mouse_brand, mouse_model, mouse_image, mouse_height, mouse_width, mouse_depth, mouse_weight, mouse_resolution, mouse_durability, mouse_price, mouse_warranty, mouse_description) VALUES ('$mouse_brand', '$mouse_model', '$target', '$mouse_height', '$mouse_width', '$mouse_depth', '$mouse_weight', '$mouse_resolution', '$mouse_durability', '$mouse_price', '$mouse_warranty', '$mouse_description');";
        mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>";
        if (mysqli_affected_rows($conn) > 0) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $target);
            echo "alert('Mouse Added Successfully');";
        }else{
            echo "alert('Mouse Not Added Successfully');";
        }
        echo "window.location.href = 'admin-manage-item-mouse.php'";
        echo "</script>";
    }
    }else{
        echo "not click";
    }
    ?>
    <?php
}else{
    header("Location: admin.php");
    exit();
}
?>