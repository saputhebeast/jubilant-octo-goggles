<?php
session_start();
require "../resources/config.php";
if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
    ?>
    <?php require "header.php";?>
    <style>
        body {
            min-height: 100vh;
            padding: 0;
        }
    </style>
    <body>
        <div class="container">
            <h1>Delete My Account</h1>
        </div>
        <div class="container">
            <?php if (isset($_GET['error'])) { ?>
                <p class="alert alert-danger text-center"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <form action="user-delete-account-submit.php" method="POST">
                <div class="form-group">
                    <label for="deleteAccount">Delete Account</label>
                    <input type="text" class="form-control" name="confirmation" placeholder="Delete My Account">
                    <small id="emailHelp" class="form-text text-muted">Enter 'Delete My Account' Text here to delete the account.</small>
                </div>
                <input type="submit" name="delete_account" class="btn btn-warning" value="Delete Account">
            </form>
        </div>
    </body>
    <style>
        .container{
            margin-top: 30px;
        }
    </style>
    <?php
}else{
    header("Location: user.php");
    exit();
}
?>