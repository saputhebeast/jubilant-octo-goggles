<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
        require "header.php";
?>

<?php
    $customer_id = $_GET['customer_id'];
    $_SESSION['customer_id'] = $customer_id;
    
    $sql = "SELECT * FROM customer WHERE customer_id = '$customer_id'";
    $result = mysqli_query($conn, $sql);
    while($row = $result->fetch_assoc()){
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $street_address = $row['street_address'];
        $city = $row['city'];
        $postal_code = $row['postal_code'];
        $phone = $row['phone'];
        $email = $row['email'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Records</title>
</head>
<body>
    <style>
        .container{
            margin-top: 30px;
        }
        .alert-container{
            margin-bottom: 30px;
        }
        .button-class{
            margin-bottom: 30px;
        }
        form{
            margin-bottom: 30px;
        }
    </style>
    <div class="container">
        <div class="alert-container alert alert-primary" role="alert">
            <h1 class="text-center">Add User</h1>
        </div>
        <div class="button-class">
            <a href="admin-manage-user.php" class="btn btn-primary">Go back to dashboard</a>
        </div>
        <form action="admin-manage-user-edit-submit.php" method="POST">
            <div class="form-group">
                <label for="">Customer ID: </label>
                <input class="form-control" type="text" name="customer_id" value = "<?php echo $customer_id?>" disabled><br>
                <label for="">First Name: </label>
                <input class="form-control" type="text" name="first_name" value = "<?php echo $first_name?>"><br>
                <label for="">Last Name: </label>
                <input class="form-control" type="text" name="last_name" value = "<?php echo $last_name?>"><br>
                <label for="">Street Address: </label>
                <input class="form-control" type="text" name="street_address" value = "<?php echo $street_address?>"><br>
                <label for="">City: </label>
                <input class="form-control" type="text" name="city" value = "<?php echo $city?>"><br>
                <label for="">Postal Code: </label>
                <input class="form-control" type="text" name="postal_code" value = "<?php echo $postal_code?>"><br>
                <label for="">Phone: </label>
                <input class="form-control" type="text" name="phone" value = "<?php echo $phone?>"><br>
                <label for="">Email: </label>
                <input class="form-control" type="email" name="email" value = "<?php echo $email?>"><br>
            </div>
            <input class="btn btn-warning" type="submit" value="Update">
        </form>
    </div>

</body>
</html>

<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>