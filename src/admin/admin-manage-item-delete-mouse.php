<?php
require "../resources/config.php";
session_start();

if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
    ?>

    <?php
    $mouse_id = $_GET['mouse_id'];

    $sql = "DELETE FROM mouse WHERE mouse_id = '$mouse_id';";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script type='text/javascript'>";
        echo "alert('Mouse Deleted Successfully');";
        echo "window.location.href = 'admin-manage-item-mouse.php'";
        echo "</script>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('Mouse Deleting Failed');";
        echo "window.location.href = 'admin-manage-item-mouse.php'";
        echo "</script>";
    }
    ?>

    <?php
}else{
    header("Location: admin.php");
    exit();
}
?>