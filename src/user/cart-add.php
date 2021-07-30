<?php
    $laptop_id = $_GET['laptop_id'];
    session_start();
    if (isset($_POST['add_to_cart'])) {
        if (isset($_SESSION['shopping_cart'])) {
            $item_array_id = array_column($_SESSION['shopping_cart'], 'laptop_id');
            if (!in_array($laptop_id, $item_array_id)) {
                $count = count($_SESSION['shopping_cart']);
                $item_array = array(
                    'laptop_id' => $laptop_id,
                    'laptop_model' => $_POST['laptop_model'],
                    'item_price' => $_POST['price'],
                    'item_quantity' => $_POST['quantity'],
                    'image' => $_POST['image']
                );
                $_SESSION['shopping_cart'][$count] = $item_array; 
            }else{
                echo '<script>alert("All ready added");</script>';
                echo '<script>window.location="user.php"</script>';
            }
        }
        else{
            $item_array = array(
                'laptop_id' => $laptop_id,
                'laptop_model' => $_POST['laptop_model'],
                'item_price' => $_POST['price'],
                'item_quantity' => $_POST['quantity'],
                'image' => $_POST['image']
            );
            $_SESSION['shopping_cart'][0] = $item_array;
        }
    }
?>