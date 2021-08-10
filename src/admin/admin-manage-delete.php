<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>

<?php
    $admin_id = $_GET['admin_id'];

    $sql = "DELETE FROM admin WHERE admin_id = '$admin_id';";
    mysqli_query($conn, $sql);

    echo "<script type='text/javascript'>";
    if (mysqli_affected_rows($conn) > 0) {
        echo "alert('Deleted Successfully');";
    }else{
        echo "alert('Deleting Failed');";
    }
    echo "window.location.href = 'admin-manage.php'";
    echo "</script>";
        ?>

<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>