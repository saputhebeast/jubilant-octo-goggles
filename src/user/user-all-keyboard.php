<?php
require "../resources/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/user/user.css">
    <title>All Keyboard</title>
</head>
<body>
<style>
    img {
        display:block;
        margin:auto;
    }
    .container{
        margin-top: 10px;
        padding-top: 10px;
    }
</style>

<?php require "header.php"?>

<div class="jumbotron jumbotron-fluid bg-muted">
    <div class="container">
        <h1 class="display-4">All Keyboard</h1>
        <p class="lead">All Keyboard Brands in One Place</p>
    </div>
</div>

<!-- all laptop -->
<div class="laptop">
    <div class="container">
        <?php
        $sql = "SELECT * FROM keyboard";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<div class='row'>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='col'>";
                ?>
                <div class="card mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['keyboard_model']?></h5>
                            <p class="card-text">
                                <img src="<?php echo $row['keyboard_image']?>" alt="" width="250px" height="250px">
                                <?php echo "Rs: ".number_format($row['keyboard_price'], 2)?>
                            </p>
                            <a href="view-full-keyboard-details.php?keyboard_id=<?php echo $row['keyboard_id']?>" class="btn btn-primary">Full Details</a>
                        </div>
                    </div>
                </div>
                <?php
                echo "</div>";
            }
            echo "</div>";
        }
        ?>
    </div>
</div>
<?php require "footer.php"?>
</body>
</html>