<?php require "../resources/config.php"?>
<style>
    .container{
        margin-top: 30px;
    }
    .media-body a{
        color: black;
    }
    .media-body a:hover{
        color: black;
        text-decoration: none;
    }
    .card{
        margin-bottom: 10px;
    }
    h6{
        font-weight: normal;
    }
</style>
<?php
    session_start();
    $laptop_id = $_GET['laptop_id'];
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
                    'image' => $_POST['laptop_image']
                );
                echo '<script>alert("Item Added Successfully");</script>';
                echo '<script>window.location="user.php"</script>';
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
                'image' => $_POST['laptop_image']
            );
            $_SESSION['shopping_cart'][0] = $item_array;
            echo '<script>alert("Item Added Successfully");</script>';
            echo '<script>window.location="user.php"</script>';
        }
    }else if (isset($_POST['buy_now'])){
        require "header.php";
        ?>
        <?php
            $customer_id = $_SESSION['customer_id'];
            $quantity = $_POST['quantity'];

            $sql = "SELECT * FROM customer WHERE customer_id = '$customer_id'";
            $result = mysqli_query($conn, $sql);
            while($row = $result->fetch_assoc()){
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $email = $row['email'];
                $street_address = $row['street_address'];
                $city = $row['city'];
                $postal_code = $row['postal_code'];
                $phone = $row['phone'];
            }
        ?>
        <?php
            $sql = "SELECT * FROM laptop WHERE laptop_id = '$laptop_id'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $laptop_model = $row['laptop_model'];
                $laptop_price = $row['price'];
                $image = $row['image'];
            }
        ?>
        <?php
            // create session variables to insert order into
            $_SESSION['order_customer_id'] = $customer_id;
            $_SESSION['order_item_id'] = $laptop_id;
            $_SESSION['order_item_name'] = $laptop_model;
            $_SESSION['order_item_image'] = $image;
            $_SESSION['order_quantity'] = $quantity;
            $_SESSION['order_total_price'] = $quantity * $laptop_price;
            $_SESSION['order_address'] = "$first_name $last_name, $street_address, $city, $postal_code.";
            $_SESSION['order_email'] = $email;
        ?>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="media position-relative">
                        <img src="<?php echo $image?>" class="mr-3" alt="..." width="120" height="120">
                        <div class="media-body">
                            <h5 class="mt-0"><a href="view-full-details.php?laptop_id=<?php echo $laptop_id ?>"><?php echo $laptop_model ?></a></h5>
                            <h6>Quantity: <?php echo $quantity?></h6>
                            <h6>Laptop Price Rs: <?php echo number_format($laptop_price, 2)?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <?php $total = number_format($quantity * $laptop_price, 2);?>
                    Total Price Rs: <?php echo $total?>
                </div>
            </div>
        </div>
        <div class="container">
            <h1>Shipping Details</h1>
        </div>
        <div class="container">
            <form action="user-checkout-buy-now-pay.php" method="POST">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="alert alert-danger text-center"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" placeholder="First Name" name="first_name" value="<?php echo $first_name?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="<?php echo $last_name?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" placeholder="Email Address" name="email" value="<?php echo $email?>">
                </div>
                <div class="form-group">
                    <label for="street_address">Street Address</label>
                    <input type="text" class="form-control" placeholder="Address" name="street_address" value="<?php echo $street_address?>">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $city?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" class="form-control" placeholder="Postal Code" name="postal_code" value="<?php echo $postal_code?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="<?php echo $phone?>">
                    </div>
                </div>
                <div class="form-group check">
                    <input type="checkbox" name="detailsCheck" id="" required> I hereby certify that the above details are true and correct
                </div>
                <div class="form-group submit">
                    <button type="submit" class="btn btn-primary btn-block">Continue to Payment</button>
                </div>
            </form>
        </div>
<?php
        require "footer.php";

    }
?>