<?php
require "../resources/config.php";
session_start();
$keyboard_id = $_GET['keyboard_id'];
$sql = "SELECT * FROM keyboard WHERE keyboard_id = $keyboard_id";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $keyboard_brand = $row['keyboard_brand'];
        $keyboard_model = $row['keyboard_model'];
        $keyboard_image = $row['keyboard_image'];
        $keyboard_type = $row['keyboard_type'];
        $keyboard_switch_type = $row['keyboard_switch_type'];
        $keyboard_connection_type = $row['keyboard_connection_type'];
        $keyboard_rgb = $row['keyboard_rgb'];
        $keyboard_warranty = $row['keyboard_warranty'];
        $keyboard_depth = $row['keyboard_depth'];
        $keyboard_height = $row['keyboard_height'];
        $keyboard_weight = $row['keyboard_weight'];
        $keyboard_price = $row['keyboard_price'];
        $keyboard_about = $row['keyboard_about'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $keyboard_model?></title>
</head>
<body>
<style>
    img {
        display:block;
        margin:auto;
    }
    .container{
        margin-bottom: 30px;
    }
</style>
<?php require "header.php"?>

<div class="jumbotron jumbotron-fluid bg-muted">
    <div class="container">
        <h1 class="display-4"><?php echo $keyboard_model?></h1>
        <p class="lead"><?php echo $keyboard_about?></p>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm">
            <?php echo "<img src='$keyboard_image' width='80%' height='90%'>"?>
        </div>
        <div class="col-sm">
            <?php
            echo "<p>$keyboard_model</p>";
            echo "<p>$keyboard_type"." $keyboard_switch_type</p>";
            echo "<p>$keyboard_connection_type</p>";
            echo "<p>$keyboard_rgb</p>";
            echo "<p>Depth: $keyboard_depth</p>";
            echo "<p>Height: $keyboard_height</p>";
            echo "<p>Weight: $keyboard_weight</p>";
            echo "<p>$keyboard_warranty"." Years Warranty</p>";
            echo "<h1>Rs: ".number_format($keyboard_price, 2)."</h1>";
            ?>
            <form action="cart-item-add.php" method="POST">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-sm-2">
                            <input class="form-control" type="number" name="quantity" id="" min='0' required placeholder="Quantity">
                            <input type="hidden" name="item_id" value="<?php echo $keyboard_id?>">
                            <input type="hidden" name="item_type" value="keyboard">
                            <input type="hidden" name="item_brand" value="<?php echo $keyboard_brand?>">
                            <input type="hidden" name="item_model" value="<?php echo $keyboard_model?>">
                            <input type="hidden" name="item_image" value="<?php echo $keyboard_image?>">
                            <input type="hidden" name="item_price" value="<?php echo $keyboard_price?>">
                        </div>
                        <div class="col-sm">
                            <input type="submit" value="Add to Cart" name="add_to_cart" class="btn btn-primary">
                            <input type="submit" value="Buy Now" name="buy_now" class="btn btn-danger">
                        </div>
                    </div>
                </div>
            </form>
            <form action="" method="POST">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-sm">
                            <input type="submit" value="Add to Wishlist" name="wishlist" class="btn btn-warning">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta officia optio recusandae sint? A accusamus adipisci culpa eaque fuga in itaque laboriosam minus odio perspiciatis porro quo sunt, vel voluptate?</h1>
</div>
<?php require "footer.php"?>
</body>
</html>