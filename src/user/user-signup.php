<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signup</title>
</head>
<body>
    <style>
        .container{
            margin-top: 30px;
        }
    </style>
    <?php require "header.php"?>
    <div class="container">
        <form action="user-signup-submit.php" method="POST">
            <?php if (isset($_GET['error'])) { ?>
                <p class="alert alert-danger text-center"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" placeholder="First Name" name="first_name">
                </div>
                <div class="form-group col-md-6">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <div class="form-group col-md-6">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Confirm Password" name="re-password">
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Email Address" name="email">
            </div>
            <div class="form-group">
                <label for="street_address">Street Address</label>
                <input type="text" class="form-control" placeholder="Address" name="street">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="city">City</label>
                <input type="text" class="form-control" placeholder="City" name="city">
                </div>
                <div class="form-group col-md-2">
                <label for="postal_code">Postal Code</label>
                <input type="text" class="form-control" placeholder="Postal Code" name="postal_code">
                </div>
                <div class="form-group col-md-4">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" placeholder="Phone Number" name="phone">
                </div>
            </div>
            <div class="form-group submit">
                <button type="submit" class="btn btn-primary">Sign in</button>
                <a class="text-primary" href="user-login.php" style="float: right">Go back to login.</a>
            </div>
        </form>
    </div>

</body>
</html>