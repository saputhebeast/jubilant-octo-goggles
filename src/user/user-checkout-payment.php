<?php
    session_start();
    require "../resources/config.php";
?>

<?php
    require "header.php";

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $street_address = $_POST['street_address'];
    $city = $_POST['city'];
    $postal_code = $_POST['postal_code'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    if ((empty($first_name)) | (empty($last_name)) | (empty($street_address)) | (empty($city)) | (empty($postal_code)) | (empty($phone)) | (empty($email))) {
        header("Location: user-checkout-shipping.php?error=empty blanks are not valid");
        exit();
    }else{
        
        // $sql = "INSERT INTO customer(first_name, last_name, street_address, city, postal_code, phone, email, password) VALUES('$first_name', '$last_name', '$street_address', '$city', '$postal_code', '$phone', '$email', '$password');";
        // mysqli_query($conn, $sql);
        
        // if (mysqli_affected_rows($conn) > 0) {
        //     echo "<script type='text/javascript'>";
        //     echo "alert('Account Created Successfully');";
        //     echo "window.location.href = 'user-login.php'";
        //     echo "</script>";
        // }else{
        //     echo "<script type='text/javascript'>";
        //     echo "alert('Account Not Created Successfully');";
        //     echo "window.location.href = 'user-signup.php'";
        //     echo "</script>";
        // }
    }
?>