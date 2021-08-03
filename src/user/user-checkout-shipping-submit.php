<?php
    session_start();
    require "../resources/config.php";
    if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){

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
    }
    else{
        $_SESSION['order_first_name'] = $first_name;
        $_SESSION['order_last_name'] = $last_name;
        $_SESSION['order_street'] = $street_address;
        $_SESSION['order_city'] = $city;
        $_SESSION['order_postal'] = $postal_code;
        $_SESSION['order_email'] = $email;
        echo "<script>window.location.href = 'user-checkout-payment.php'</script>";
    }
    }else{
        header("Location: user.php");
        exit();
    }
?>