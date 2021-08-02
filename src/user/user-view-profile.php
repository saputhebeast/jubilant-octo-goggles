<?php
    require "../resources/config.php";
    session_start();
    if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>
    <?php require "header.php";?>

    <?php
    $customer_id = $_SESSION['customer_id'];
    
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
    <style>
        .container{
            margin-top: 30px;
        }
    </style>
    <div class="container">
        <form action="user-view-profile-edit.php" method="POST">
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
            <div class="form-group submit">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
<?php
    }else{
        header("Location: user.php");
        exit();
    }
?>