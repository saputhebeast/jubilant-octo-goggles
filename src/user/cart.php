<?php
    session_start();
    if (!empty($_SESSION['shopping_cart'])) {
        $total = 0;
        foreach ($_SESSION['shopping_cart'] as $key => $value) {
            echo $value['laptop_id'];
        }
    }
?>