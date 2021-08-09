<?php
require "../resources/config.php";
session_start();

if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
    ?>

    <?php
    if (isset($_POST['update_mouse'])){
        $mouse_id = $_POST['mouse_id'];
        $mouse_brand = $_POST['mouse_brand'];
        $mouse_model = $_POST['mouse_model'];
        $mouse_image = $_FILES['mouse_image'];
        $mouse_length = $_POST['mouse_length'];
        $mouse_width = $_POST['mouse_width'];
        $mouse_height = $_POST['mouse_height'];
        $mouse_weight = $_POST['mouse_weight'];
        $mouse_resolution = $_POST['mouse_resolution'];
        $mouse_durability = $_POST['mouse_durability'];
        $mouse_price = $_POST['mouse_price'];
        $mouse_warranty = $_POST['mouse_warranty'];
        $mouse_description = $_POST['mouse_description'];

        $target = "../images/mouse/".basename($_FILES['mouse_image']['name']);
        $imageFileType = strtolower(pathinfo($target,PATHINFO_EXTENSION));

    if (empty($mouse_brand) | empty($mouse_model) | empty($mouse_length) | empty($mouse_width) | empty($mouse_height) | empty($mouse_weight) | empty($mouse_resolution) | empty($mouse_durability) | empty($mouse_price) | empty($mouse_warranty) | strlen($mouse_description)== 0) {
        header("Location: admin-manage-item-edit-mouse.php?mouse_id={$mouse_id}&error=empty blanks not valid");
        exit();
    }elseif($_FILES['mouse_image']['error'] !== UPLOAD_ERR_OK){
        header("Location: admin-manage-item-edit-mouse.php?mouse_id={$mouse_id}&error=you need to add image");
        exit();
    }elseif(file_exists($target)){
        header("Location: admin-manage-item-edit-mouse.php?mouse_id={$mouse_id}&error=file already exists");
        exit();
    }elseif ($_FILES["mouse_image"]["size"] > 500000) {
        header("Location: admin-manage-item-edit-mouse.php?mouse_id={$mouse_id}&error=too large file");
        exit();
    }
    elseif ($imageFileType != "png") {
        header("Location: admin-manage-item-edit-mouse.php?mouse_id={$mouse_id}&error=only png files are allowed");
        exit();
    }else{
        $sql = "UPDATE mouse SET mouse_brand = '$mouse_brand', mouse_model = '$mouse_model', mouse_image = '$target', mouse_length = '$mouse_length', mouse_width = '$mouse_width', mouse_height = '$mouse_height', mouse_weight = '$mouse_weight', mouse_resolution = '$mouse_resolution', mouse_durability = '$mouse_durability', mouse_price = '$mouse_price', mouse_warranty = '$mouse_warranty', mouse_description = '$mouse_description' WHERE mouse_id = '$mouse_id'";
        mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) > 0) {
            move_uploaded_file($_FILES["mouse_image"]["tmp_name"], $target);
            echo "<script type='text/javascript'>";
            echo "alert('Laptop Updated Successfully');";
            echo "window.location.href = 'admin-manage-item-mouse.php'";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('Laptop Not Updated Successfully');";
            echo "window.location.href = 'admin-manage-item-mouse.php'";
            echo "</script>";
        }
    }
    }
    ?>
    <?php
}else{
    header("Location: admin.php");
    exit();
}
?>