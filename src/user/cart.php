<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Cart</title>
</head>
<body>
    <style>
        .container{
            margin-top: 30px;
        }

        .container a:hover{
            text-decoration: none;
        }
    </style>
    <?php require "header.php"?>
    <div class="container">
        <h1>My Cart</h1>
    </div>
    <div class="container">
        <?php
            if (!empty($_SESSION['shopping_cart'])) {
                $total = 0;
        ?>
        <table class="table table-striped text-left">
        <tr>
            <th>Item Name</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th> 
        </tr>
        <?php
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
            <td colspan="3" align="right">Rs: <?php echo number_format($total, 2);?></td>
        </tr>
        <?php
        }else{
        ?>
            <div class="container">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Your Shopping Cart is empty!</h4>
                    <hr>
                    <p class="mb-0">Don't miss out on great deals! Start shopping or log in to view products added.</p>
                </div>
            </div>
        <?php
        }
        ?>
    </table>
    </div>
</body>
</html>