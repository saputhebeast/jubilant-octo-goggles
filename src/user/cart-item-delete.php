<?php
session_start();
require "../resources/config.php";
if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
    if (isset($_GET['id'])){
        $sql = "DELETE FROM cart WHERE cart_item_id = '$_GET[id]';";
        mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>";
        if (mysqli_affected_rows($conn) > 0) {
            echo "alert('Deleted Successfully');";
        }else{
            echo "alert('Deleting Failed');";
        }
        echo "window.location.href = 'cart.php'";
        echo "</script>";

    }
}else{
    header("Location: user-login.php");
}
?>