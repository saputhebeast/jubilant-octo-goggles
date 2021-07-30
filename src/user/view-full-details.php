<?php 
    require "../resources/config.php";

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
    <?php
        echo "<h1>{$laptop_model}</h1>";
        echo "<img src='$image'>";
        echo "<p>$about_laptop</p><br>";
        echo "<p>$laptop_model"." $processor</p>";
        echo "<p> $processor"." $processor_model</p>";
        echo "<p>$ram</p>";
        echo "<p>$laptop_storage</p>";
        echo "<p>$display_resolution, "."$display_description</p>";
        echo "<p>$gpu</p>";
        echo "<p>$weight</p>";
        echo "<p>$warranty"." Years Warranty</p>";
        echo "<h2>Rs: ".$price."</h2>";
    ?>
    <form action="cart-item-add.php?laptop_id=<?php echo $laptop_id?>" method="POST">
        <input type="number" name="quantity" id="" min='0'>
        <input type="hidden" name="laptop_model" value="<?php echo $laptop_model?>">
        <input type="hidden" name="laptop_image" value="<?php echo $image?>">
        <input type="hidden" name="price" value="<?php echo $price?>">
        <input type="submit" value="Add to Cart" name="add_to_cart">
    </form>
    <form action="#" method="POST">
    <input type="submit" value="Buy Now" name="buy">
    </form>
</body>
</html>