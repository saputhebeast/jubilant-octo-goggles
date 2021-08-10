<?php
session_start();
require "../resources/config.php";
if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
    if (isset($_POST['pay'])) {
        $owner_name = $_POST['card_owner'];
        $card_number = $_POST['card_number'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $cvv = $_POST['cvv'];

        if ($owner_name !== 'Andrew Perera') {
            header("Location: user-checkout-payment.php?error=invalid owner name");
            exit();
        }else if($card_number !== '1234123412341234'){
            header("Location: user-checkout-payment.php?error=invalid card number");
            exit();
        }else if($month !== '12'){
            header("Location: user-checkout-payment.php?error=invalid month");
            exit();
        }else if($year !== '24'){
            header("Location: user-checkout-payment.php?error=invalid year");
            exit();
        }else if($cvv !== '111'){
            header("Location: user-checkout-payment.php?error=invalid cvv");
            exit();
        }else{

            $sql = "INSERT INTO item_order 
    (order_customer_id, order_item_id, order_item_name, order_item_image, order_quantity, order_total_price, address, email, order_status) 
VALUES ('$_SESSION[customer_id]', '$_SESSION[order_item_id]', '$_SESSION[order_item_name]', '$_SESSION[order_item_image]', '$_SESSION[order_quantity]', 
        '$_SESSION[order_total_price]', '$_SESSION[order_address]', '$_SESSION[order_email]', 'Ordered')";
            mysqli_query($conn, $sql);

            if (mysqli_affected_rows($conn) > 0){
                unset($_SESSION['order_item_id']);
                unset($_SESSION['order_item_name']);
                unset($_SESSION['order_item_image']);
                unset($_SESSION['order_quantity']);
                unset($_SESSION['order_total_price']);
                unset($_SESSION['order_first_name']);
                unset($_SESSION['order_last_name']);
                unset($_SESSION['order_street']);
                unset($_SESSION['order_city']);
                unset($_SESSION['order_postal']);
                unset($_SESSION['order_email']);
                unset($_SESSION['order_address']);
                echo "<script type='text/javascript'>";
                echo "window.location.href = 'user-checkout-complete.php?status=success'";
            }else{
                echo "<script type='text/javascript'>";
                echo "window.location.href = 'user-checkout-complete.php?status=fail'";
            }
            echo "</script>";
        }
        }
}else{
    header("Location: user.php");
}
?>