<?php
    session_start();
    require "../resources/config.php";
    if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
    require "header.php";
?>
<style>
    .container{
        margin-top: 30px;
    }
</style>
<div class="container">
    <h1>Payment</h1>
</div>
<div class="container">
    <form action="user-checkout-payment-submit.php" method="POST">
        <?php if (isset($_GET['error'])) { ?>
            <p class="alert alert-danger text-center"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <div class="form-group"> <label for="username">
                <h6>Card Owner</h6>
            </label> <input type="text" name="card_owner" placeholder="Card Owner Name" required class="form-control "> </div>
        <div class="form-group"> <label for="cardNumber">
                <h6>Card number</h6>
            </label>
            <div class="input-group"> <input type="text" name="card_number" placeholder="Valid card number" class="form-control " required>
                <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group"> <label><span class="hidden-xs">
                            <h6>Expiration Date</h6>
                        </span></label>
                    <div class="input-group"> <input type="number" placeholder="MM" name="month" class="form-control" required min="0"> <input type="number" placeholder="YY" name="year" class="form-control" required min="0"> </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                        <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                    </label> <input type="text" name="cvv" required class="form-control"> </div>
            </div>
        </div>
        <div> <input type="submit" class="btn btn-primary btn-block" name="pay" value="Pay"></div>
    </form>
</div>
<?php require "footer.php"?>
<?php
    }else{
        header("Location: user.php");
    }
?>