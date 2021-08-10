<?php 
    session_start();
    require "../resources/config.php";
    if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
        require "header.php";
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
    <div class="container">
        <h1>My Cart</h1>
    </div>
    <div class="container">
        <?php
            $sql = "SELECT * FROM cart";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                ?>
        <table class="table table-striped text-left">
            <thead>
            <tr>
                <th>Item Name</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            </thead>
                <?php
                $cart_total = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['cart_item_type'] == 'mouse'){
                        $link = 'view-full-mouse-details.php';
                        $id = 'mouse_id';
                    }elseif ($row['cart_item_type'] == 'keyboard'){
                        $link = 'view-full-keyboard-details.php';
                        $id = 'keyboard_id';
                    }elseif ($row['cart_item_type'] == 'laptop'){
                        $link = 'view-full-laptop-details.php';
                        $id = 'laptop_id';
                    }
        ?>
            <tr>
                <td><a href="<?php echo $link?>?<?php echo $id?>=<?php echo $row['item_id']?>"><?php echo $row['cart_item_model']?></a></td>
                <td><img src="<?php echo $row['cart_item_image']?>" alt="" width="100" height="100"></td>
                <td><?php echo $row['cart_item_quantity']?></td>
                <td>Rs: <?php echo number_format($row['cart_item_price'], 2)?></td>
                <?php $cart_total += $row['cart_item_quantity'] * $row['cart_item_price']; ?>
                <td>Rs: <?php echo number_format($cart_total, 2);?></td>
                <td><a href="cart-item-delete.php?id=<?php echo $row['cart_item_id']?>">Delete</a></td>
            </tr>
                    <?php } ?>
        <tr>
            <td colspan="1" class="text-right">Total</td>
            <td colspan="2" class="text-right">Rs: <?php echo number_format($cart_total, 2);?></td>
            <td colspan="3" class="text-center"><a href="user-checkout-shipping.php" class="btn btn-primary">Checkout All Items</a></td>
        </tr>
        <?php
            $_SESSION['total'] = $cart_total;
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
<?php
    }else{
        header("Location: user-login.php");
    }
?>