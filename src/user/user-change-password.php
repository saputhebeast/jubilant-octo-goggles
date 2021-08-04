<?php
    session_start();
    require "../resources/config.php";
    if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>
    <?php require "header.php";?>
    <style>
        .container{
            margin-top: 30px;
        }
    </style>
    <div class="container">
        <h1><?php echo ucfirst($_SESSION['first_name'])?>'s Password Change</h1>
    </div>

    <div class="container">
        <form action="user-change-password-submit.php" method="POST">
            <?php if (isset($_GET['error'])) { ?>
                <p class="alert alert-danger text-center"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <div class="form-row">
                <div class="form-group col-md-4">
                <label for="old_password">Old Password</label>
                <input type="password" class="form-control" placeholder="Old Password" name="old-password">
                </div>
                <div class="form-group col-md-4">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control" placeholder="New Password" name="new-password">
                </div>
                <div class="form-group col-md-4">
                <label for="confirm_new_password">Confirm New Password</label>
                <input type="password" class="form-control" placeholder="Confirm New Password" name="confirm-new-password">
                </div>
            </div>
            <div class="form-group submit">
                <button type="submit" class="btn btn-primary">Change Password</button>
            </div>
        </form>
    </div>
    <?php require "footer.php"?>
<?php
    }else{
        header("Location: user.php");
        exit();
    }
?>