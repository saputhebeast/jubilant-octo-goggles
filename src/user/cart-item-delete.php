<?php
session_start();
if (isset($_GET['action'])) {

    if ($_GET['action'] == 'delete') {
        foreach ($_SESSION['shopping_cart'] as $key => $value) {
            if ($value['laptop_id'] == $_GET['id']) {
                unset($_SESSION['shopping_cart'][$key]);
                echo "<script>alert('item removed')</script>";
                echo "<script>window.location='cart.php'</script>";
            }
        }
    }
}
?>
