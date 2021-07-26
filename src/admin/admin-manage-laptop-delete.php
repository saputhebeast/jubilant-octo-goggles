<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>

<?php
    $laptop_id = $_GET['laptop_id'];

    $sql = "DELETE FROM laptop WHERE laptop_id = '$laptop_id';";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script type='text/javascript'>";
        echo "alert('Laptop Deleted Successfully');";
        echo "window.location.href = 'admin-manage-item.php'";
        echo "</script>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('Laptop Deleting Failed');";
        echo "window.location.href = 'admin-manage-item.php'";
        echo "</script>";
    }
?>

<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>