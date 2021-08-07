<?php
require "../resources/config.php";
session_start();

if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
    ?>

    <?php
    if (isset($_POST['update_status'])){
        $order_status = $_POST['order_status'];
    }
    $sql = "UPDATE item_order SET order_status = '$order_status' WHERE order_id = '$_SESSION[order_id]'";
    mysqli_query($conn, $sql);

    unset($_SESSION['order_id']);
    echo "<script type='text/javascript'>";
    if (mysqli_affected_rows($conn) > 0) {
        echo "alert('Updated Successfully');";
    }else{
        echo "alert('Not Updated');";
    }
    echo "window.location.href = 'admin-manage-orders.php'";
    echo "</script>";
    ?>
    <?php
}else{
    header("Location: admin.php");
    exit();
}
?>
