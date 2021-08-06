letter of inquiry for computer purchase

Dear (Sir/Madam)

I would like to inform you that I have a plan to purchase computers. I want to inquire about various types of computers as I need them.

While discussing the matter of purchasing computers, one of my friends suggested for your reputed company. I also came to know that you never betrayed your customers and your products are in high rating in the market as well as the reasonable price. So, I am planning to purchase it from you.

The aspects to which I would require information about the product are as follows;

1) If the computer can work with good performance
2) If it will run fast on any kinds of internet connection
3) The ram sizes
4) The processor of the computer
5) The name of the brand
6) Best possible price
7) Warranty period
8) Antivirus warranty period
9) Window version
10) Display size
11) Design system
12) Memory system
13) Hard drive size

I would also like to know your delivery system and mode of payment.

Kindly help me with all the details as soon as possible, so that I can purchase computer from your store.

Thank you very much.

Regards,
Peter Parker



<?php
require "../resources/config.php";
session_start();
$laptop_id = $_GET['laptop_id'];
$sql = "SELECT * FROM laptop WHERE laptop_id = $laptop_id";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $laptop_id = $row['laptop_id'];
        $laptop_brand = $row['laptop_brand'];
        $laptop_model = $row['laptop_model'];
        $processor = $row['processor'];
        $processor_model = $row['processor_model'];
        $gpu = $row['gpu'];
        $ram = $row['ram'];
        $laptop_storage = $row['laptop_storage'];
        $refresh_rate = $row['refresh_rate'];
        $display_resolution = $row['display_resolution'];
        $display_description = $row['display_description'];
        $weight = $row['weight'];
        $warranty = $row['warranty'];
        $price = $row['price'];
        $about_laptop = $row['about_laptop'];
        $image = $row['image'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $laptop_model?></title>
</head>
<body>
<style>
    img {
        display:block;
        margin:auto;
    }
</style>
<?php require "header.php"?>

<div class="jumbotron jumbotron-fluid bg-muted">
    <div class="container">
        <h1 class="display-4"><?php echo $laptop_model?></h1>
        <p class="lead"><?php echo $about_laptop?></p>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm">
            <?php echo "<img src='$image'>"?>
        </div>
        <div class="col-sm">
            <?php
            echo "<p>$laptop_model"." $processor</p>";
            echo "<p> $processor"." $processor_model</p>";
            echo "<p>$ram</p>";
            echo "<p>$laptop_storage</p>";
            echo "<p>$display_resolution, "."$display_description</p>";
            echo "<p>$gpu</p>";
            echo "<p>$weight</p>";
            echo "<p>$warranty"." Years Warranty</p>";
            echo "<h1>Rs: ".number_format($price, 2)."</h1>";
            ?>
            <form action="cart-item-add.php?laptop_id=<?php echo $laptop_id?>" method="POST">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-sm-2">
                            <input class="form-control" type="number" name="quantity" id="" min='0' required placeholder="Quantity">
                            <input type="hidden" name="laptop_model" value="<?php echo $laptop_model?>">
                            <input type="hidden" name="laptop_image" value="<?php echo $image?>">
                            <input type="hidden" name="price" value="<?php echo $price?>">
                        </div>
                        <div class="col-sm">
                            <input type="submit" value="Add to Cart" name="add_to_cart" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </form>
            <form action="user-buy-now.php" method="POST">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-sm">
                            <input type="submit" value="Buy Now" name="buy" class="btn btn-danger">
                        </div>
                    </div>
                </div>
            </form>
            <form action="user-wishlist-add-item.php?item_id=<?php echo $laptop_id?>" method="POST">
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
<?php require "footer.php"?>
</body>
</html>