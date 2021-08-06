<?php
require "../resources/config.php";
session_start();

if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
    ?>

    <?php
    if (isset($_POST['update_status'])){
        $order_status = $_POST['order_status'];
    }
    $sql = "UPDATE item_order SET order_status = '$order_status'";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script type='text/javascript'>";
        echo "alert('Updated Successfully');";
        echo "window.location.href = 'admin-manage-orders.php'";
        echo "</script>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('Not Updated');";
        echo "window.location.href = 'admin-manage-orders.php'";
        echo "</script>";
    }
    ?>
    <?php
}else{
    header("Location: admin.php");
    exit();
}
?>