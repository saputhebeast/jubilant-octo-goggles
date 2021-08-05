<?php
    require "../resources/config.php";
    require "header.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <style>
        .container{
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="col col-12">
            <?php if (isset($_GET['status'])) {
                if ($_GET['status'] === 'success'){
                    echo "<p class='alert alert-success text-center'>Your message has sent successfully!</p>";
                }else{
                    echo "<p class='alert alert-danger text-center'>Your message has not sent successfully!</p>";
                }
                ?>

            <?php } ?>
        </div>
        <form action="contact-us-submit.php" method="POST">
            <div class="form-group">
                <label for="customerName">Your Name</label>
                <input class="form-control" type="text" name="contact_name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="customerEmail">Email Address</label>
                <input type="email" class="form-control" name="contact_email" placeholder="Email Address" required>
            </div>
            <div class="form-group">
                <label for="customerSubject">Subject</label>
                <input type="text" class="form-control" name="contact_subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
                <label for="customerMessage">Message</label>
                <textarea class="form-control" rows="5" placeholder="Type Message..." name="contact_message" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary" name="send">
            </div>
        </form>
    </div>
</body>
<?php
    require "footer.php";
?>
</html>
