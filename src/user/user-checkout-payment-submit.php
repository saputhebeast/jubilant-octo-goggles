<?php
    session_start();
    require "../resources/config.php";
    if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
        $customer_id = $_SESSION['customer_id'];
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
                
                $order_address = "{$_SESSION['order_first_name']} {$_SESSION['order_last_name']}, {$_SESSION['order_street']}, {$_SESSION['order_city']}, {$_SESSION['order_postal']}";

                $sql = "SELECT * FROM cart WHERE cart_customer_id = '$customer_id'";
                $result = mysqli_query($conn, $sql);
                while($row = $result->fetch_assoc()){
                    $total_price = $row['cart_item_quantity'] * $row['cart_item_price'];
                    $sql = "INSERT INTO item_order (order_customer_id, order_item_id, order_item_name, order_item_image, order_quantity, order_total_price, address, email, order_status) 
        VALUES ('$customer_id', '$row[cart_item_id]', '$row[cart_item_model]', '$row[cart_item_image]', '$row[cart_item_quantity]', '$total_price', '$order_address', '$_SESSION[order_email]', 'Ordered')";
                    mysqli_query($conn, $sql);
                    if (mysqli_affected_rows($conn) > 0) {
                        $sql = "DELETE FROM cart WHERE cart_item_id ='$row[cart_item_id]'";
                        mysqli_query($conn, $sql);
                    }
                }
                echo "<script type='text/javascript'>";
                if(mysqli_affected_rows($conn)){
                    echo "window.location.href = 'user-checkout-complete.php?status=success'";
                }else{
                    echo "window.location.href = 'user-checkout-complete.php?status=fail'";
                }
                echo "</script>";
        }
    }
    }else{
        header("Location: user.php");
    }
?>