<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>

<?php
    $item_id = $_GET['item_id'];

    $sql = "DELETE FROM wishlist WHERE item_id = '$item_id';";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script type='text/javascript'>";
        echo "alert('Item Deleted Successfully');";
        echo "window.location.href = 'user-wishlist.php'";
        echo "</script>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('Item Deleting Failed');";
        echo "window.location.href = 'user-wishlist.php'";
        echo "</script>";
    }
?>

<?php
    }else{
        header("Location: user.php");
        exit();
    }
?>