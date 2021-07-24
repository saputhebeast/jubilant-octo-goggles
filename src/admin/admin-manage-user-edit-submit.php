<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>

<?php
    $customer_id = $_SESSION['customer_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $street_address = $_POST['street_address'];
    $city = $_POST['city'];
    $postal_code = $_POST['postal_code'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "UPDATE customer SET first_name = '$first_name', last_name = '$last_name', street_address = '$street_address', city = '$city', postal_code = '$postal_code', phone = '$phone', email = '$email'  WHERE customer_id = '$customer_id';";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script type='text/javascript'>";
        echo "alert('Updated Successfully');";
        echo "window.location.href = 'admin-manage-user.php'";
        echo "</script>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('Not Updated');";
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