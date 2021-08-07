<?php
require "../resources/config.php";
session_start();

if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
    ?>

    <?php
    $keyboard_id = $_GET['keyboard_id'];

    $sql = "DELETE FROM keyboard WHERE keyboard_id = '$keyboard_id';";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script type='text/javascript'>";
        echo "alert('Keyboard Deleted Successfully');";
        echo "window.location.href = 'admin-manage-item-keyboard.php'";
        echo "</script>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('Keyboard Deleting Failed');";
        echo "window.location.href = 'admin-manage-item-keyboard.php'";
        echo "</script>";
    }
    ?>

    <?php
}else{
    header("Location: admin.php");
    exit();
}
?>