<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>

<?php
    $customer_id = $_GET['customer_id'];

    $sql = "DELETE FROM customer WHERE customer_id = '$customer_id';";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script type='text/javascript'>";
        echo "alert('Deleted Successfully');";
        echo "window.location.href = 'admin-manage-user.php'";
        echo "</script>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('Deleting Failed');";
        echo "window.location.href = 'admin-manage-user.php'";
        echo "</script>";
    }
?>

<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>