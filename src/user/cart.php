<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php require "header.php"?>
    <div class="container">
    <table border="1">
        <tr>
            <th>Item Name</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th> 
        </tr>
        <?php
            if (!empty($_SESSION['shopping_cart'])) {
                $total = 0;
                foreach ($_SESSION['shopping_cart'] as $key => $value) {
        ?>
            <tr>
                <td><?php echo $value['laptop_model']?></td>
                <td><img src="<?php echo $value['image']?>" alt="" width="100" height="100"></td>
                <td><?php echo $value['item_quantity']?></td>
                <td><?php echo number_format($value['item_price'], 2)?></td>
                <td><?php echo number_format($value['item_quantity'] * $value['item_price'], 2);?></td>
                <td><a href="cart-item-delete.php?action=delete&id=<?php echo $value['laptop_id']?>">Delete</a></td>
            </tr>
        <?php 
            $total = $total + ($value['item_quantity'] * $value['item_price']);
            }
        ?>
        <tr>
            <td colspan="3" align="center">Total</td>
            <td colspan="3" align="right">RS: <?php echo number_format($total, 2);?></td>
        </tr>
        <?php
        }else{
            echo "No item in the cart";
        }
        ?>
    </table>
    </div>
</body>
</html>