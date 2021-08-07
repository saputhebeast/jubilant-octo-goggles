<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>

<?php
    $laptop_id = $_POST['laptop_id'];
    $laptop_brand = $_POST['laptop_brand'];
    $laptop_model = $_POST['laptop_model'];
    $processor = $_POST['processor']; 
    $processor_model = $_POST['processor_model'];
    $gpu = $_POST['gpu'];
    $ram = $_POST['ram'];
    $laptop_storage = $_POST['laptop_storage'];
    $refresh_rate = $_POST['refresh_rate'];
    $display_resolution = $_POST['display_resolution'];
    $display_description = $_POST['display_description'];
    $weight = $_POST['weight'];
    $warranty = $_POST['warranty'];
    $price = $_POST['price'];
    $about_laptop = $_POST['about_laptop'];
    $image = $_FILES['image'];

    $target = "../images/laptop/".basename($_FILES['image']['name']);
    $imageFileType = strtolower(pathinfo($target,PATHINFO_EXTENSION));

    if (empty($laptop_brand) | empty($laptop_model) | empty($processor) | empty($processor_model) | empty($gpu) | empty($ram) | empty($laptop_storage) | empty($refresh_rate) | empty($display_resolution) | empty($display_description) | empty($weight) | empty($warranty) | empty($price) | strlen($about_laptop)== 0) {
        header("Location: admin-manage-item-edit-laptop.php?laptop_id={$laptop_id}&error=empty blanks not valid");
        exit();
    }elseif(file_exists($target)){
        header("Location: admin-manage-item-edit-laptop.php?laptop_id={$laptop_id}&error=file already exists");
        exit();
    }elseif ($_FILES["image"]["size"] > 500000) {
        header("Location: admin-manage-item-edit-laptop.php?laptop_id={$laptop_id}&error=too large file");
        exit();
    }
    elseif ($imageFileType != "png") {
        header("Location: admin-manage-item-edit-laptop.php?laptop_id={$laptop_id}&error=only png files are allowed");
        exit();
    }else{
        move_uploaded_file($_FILES["image"]["tmp_name"], $target);

        $sql = "UPDATE laptop SET laptop_brand = '$laptop_brand', laptop_model = '$laptop_model', image = '$target', processor = '$processor', processor_model = '$processor_model', gpu = '$gpu', ram = '$ram', laptop_storage = '$laptop_storage', refresh_rate = '$refresh_rate', display_resolution = '$display_resolution', display_description = '$display_description', weight = '$weight', warranty = '$warranty', price = '$price', about_laptop = '$about_laptop' WHERE laptop_id = '$laptop_id'";
        mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) > 0) {
            echo "<script type='text/javascript'>";
            echo "alert('Laptop Updated Successfully');";
            echo "window.location.href = 'admin-manage-item-laptop.php'";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('Laptop Not Updated Successfully');";
            echo "window.location.href = 'admin-manage-item-laptop.php'";
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