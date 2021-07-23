<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>

<?php
    $admin_id = $_SESSION['admin_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    $sql = "UPDATE admin SET first_name = '$first_name', last_name = '$last_name', email = '$email' WHERE admin_id = '$admin_id'";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script type='text/javascript'>";
        echo "alert('Updated Successfully');";
        echo "window.location.href = 'admin-manage.php'";
        echo "</script>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('Updated Successfully');";
        echo "window.location.href = 'admin-manage.php'";
        echo "</script>";
    }
?>
<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>