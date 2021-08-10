<?php
    session_start();
    require "../resources/config.php";
    if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>
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
        $item_id = $_POST['item_id'];
        $item_type = $_POST['item_type'];
        $item_brand = $_POST['item_brand'];
        $item_model = $_POST['item_model'];
        $item_price = $_POST['item_price'];
        $item_quantity =  $_POST['quantity'];
        $item_image = $_POST['item_image'];

        if ($item_type == 'mouse'){
            $link = 'view-full-mouse-details.php';
            $id = 'mouse_id';
        }elseif ($item_type == 'keyboard'){
            $link = 'view-full-keyboard-details.php';
            $id = 'keyboard_id';
        }elseif ($item_type == 'laptop'){
            $link = 'view-full-laptop-details.php';
            $id = 'laptop_id';
        }

        if (isset($_POST['add_to_cart'])){
            $sql = "INSERT INTO cart (item_id, cart_item_type, cart_item_brand, cart_item_model, cart_item_image, cart_item_quantity, cart_item_price, cart_customer_id) 
VALUES ('$item_id', '$item_type', '$item_brand', '$item_model', '$item_image', '$item_quantity', '$item_price', '$_SESSION[customer_id]');";
            $result = mysqli_query($conn, $sql);

            echo "<script>";
            if (mysqli_affected_rows($conn) > 0){
                echo '<script>alert("Item Added Successfully");</script>';
            }else{
                echo '<script>alert("Item Not Added Successfully");</script>';
            }
            echo '<script>window.location="user.php"</script>';
            echo "</script>";
        } elseif (isset($_POST['buy_now'])){
            require "header.php";
            $sql = "SELECT * FROM $item_type WHERE $id = '$item_id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            ?>
            <!-- buying product details -->
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="media position-relative">
                            <img src="<?php echo $item_image?>" class="mr-3" alt="..." width="120" height="120">
                            <div class="media-body">
                                <h5 class="mt-0"><a href="<?php echo $link?>?<?php echo $id?>=<?php echo $item_id?>"><?php echo $item_model ?></a></h5>
                                <h6>Quantity: <?php echo $item_quantity?></h6>
                                <h6>Laptop Price Rs: <?php echo number_format($item_price, 2)?></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <?php $total = number_format($item_quantity * $item_price, 2);?>
                        Total Price Rs: <?php echo $total?>
                    </div>
                </div>
            </div>

            <!-- shipping details -->
            <?php
                $_SESSION['order_item_id'] = $item_id;
                $_SESSION['order_item_name'] = $item_model;
                $_SESSION['order_item_image'] = $item_image;
                $_SESSION['order_quantity'] = $item_quantity;
                $_SESSION['order_total_price'] = $item_quantity * $item_price;

                $customer_id = $_SESSION['customer_id'];

                $sql = "SELECT * FROM customer WHERE customer_id = '$customer_id'";
                $result = mysqli_query($conn, $sql);
                while($row = $result->fetch_assoc()) {
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $email = $row['email'];
                    $street_address = $row['street_address'];
                    $city = $row['city'];
                    $postal_code = $row['postal_code'];
                    $phone = $row['phone'];
                }
            ?>
            <div class="container">
                <h1>Shipping Details</h1>
            </div>
            <div class="container">
                <form action="user-checkout-buy-now-pay.php" method="POST">
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="alert alert-danger text-center">--><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" placeholder="First Name" name="first_name" value="<?php echo $first_name?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="<?php echo $last_name?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Email Address" name="email" value="<?php echo $email?>" required>
                    </div>
                    <div class="form-group">
                        <label for="street_address">Street Address</label>
                        <input type="text" class="form-control" placeholder="Address" name="street_address" value="<?php echo $street_address?>" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="city">City</label>
                            <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $city?>" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="postal_code">Postal Code</label>
                            <input type="text" class="form-control" placeholder="Postal Code" name="postal_code" value="<?php echo $postal_code?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="<?php echo $phone?>" required>
                        </div>
                    </div>
                    <div class="form-group check">
                        <input type="checkbox" name="detailsCheck" id="" required> I hereby certify that the above details are true and correct
                    </div>
                    <div class="form-group submit">
                        <button type="submit" class="btn btn-primary btn-block" name="continue-pay">Continue to Payment</button>
                    </div>
                </form>
            </div>
            <?php require "footer.php";} ?>
<?php
    }else{
        header("Location: user-login.php");
    }
?>