<?php
require "../resources/config.php";
session_start();
$mouse_id = $_GET['mouse_id'];
$sql = "SELECT * FROM mouse WHERE mouse_id = '$mouse_id'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $mouse_brand = $row['mouse_brand'];
        $mouse_model = $row['mouse_model'];
        $mouse_image = $row['mouse_image'];
        $mouse_length = $row['mouse_length'];
        $mouse_width = $row['mouse_width'];
        $mouse_height = $row['mouse_height'];
        $mouse_weight = $row['mouse_weight'];
        $mouse_resolution = $row['mouse_resolution'];
        $mouse_durability = $row['mouse_durability'];
        $mouse_price = $row['mouse_price'];
        $mouse_warranty = $row['mouse_warranty'];
        $mouse_description = $row['mouse_description'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $mouse_model?></title>
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
        <h1 class="display-4"><?php echo $mouse_model?></h1>
        <p class="lead"><?php echo $mouse_description?></p>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm">
            <?php echo "<img src='$mouse_image' width='70%' height='80%'>"?>
        </div>
        <div class="col-sm">
            <?php
            echo "<p>$mouse_model</p>";
            echo "<p>Length: $mouse_length</p>";
            echo "<p>Width: $mouse_width</p>";
            echo "<p>Height: $mouse_height</p>";
            echo "<p>$mouse_resolution dpi</p>";
            echo "<p>$mouse_durability clicks</p>";
            echo "<p>Weight: $mouse_weight</p>";
            echo "<p>$mouse_warranty"." Years Warranty</p>";
            echo "<h1>Rs: ".number_format($mouse_price, 2)."</h1>";
            ?>
            <form action="cart-item-add.php?type=mouse&brand=<?php echo $mouse_brand?>&id=<?php echo $mouse_id?>" method="POST">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-sm-2">
                            <input class="form-control" type="number" name="quantity" id="" min='0' required placeholder="Quantity">
                            <input type="hidden" name="item_id" value="<?php echo $mouse_id?>">
                            <input type="hidden" name="item_model" value="<?php echo $mouse_model?>">
                            <input type="hidden" name="item_type" value="mouse">
                            <input type="hidden" name="item_brand" value="<?php echo $mouse_brand?>">
                            <input type="hidden" name="item_image" value="<?php echo $mouse_image?>">
                            <input type="hidden" name="item_price" value="<?php echo $mouse_price?>">
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