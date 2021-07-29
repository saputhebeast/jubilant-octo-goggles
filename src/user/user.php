<?php 
    session_start();
    require "../resources/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/user/user.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <a href="#">Home</a>
        <a href="#">Laptops</a>
        <a href="#">Keyboards</a>
        <a href="#">Mouse</a>
        <a href="#">All Products</a>
        <?php
            if (isset($_SESSION['customer_id'])) {
                echo "<a href='user-logout.php'>Logout</a>";
            }else{
                echo "<a href='user-login.php'>Login</a>";
            }
        ?>
        <div class="search-container">
            <form action="#">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>

    <h1>Asus Laptop</h1>
    <a href="view-more.php?laptop_brand=Asus">View More Asus Laptops</a>
    <table>
    <?php
        $sql = "SELECT * FROM laptop WHERE laptop_brand = 'Asus' LIMIT 3";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<td>";
                ?>
                <div class="row">
                    <div class="column">
                        <img src="<?php echo $row['image']?>" alt="" width="250px" height="250px">
                        <h3><?php echo $row['laptop_model']?></h3>
                        <h4><?php echo "RS: ".$row['price']?></h4>
                        <a href="view-full-details.php?laptop_id=<?php echo $row['laptop_id']?>">Full Details</a>
                    </div>
                </div>
                <?php
                echo "</td>";
            }
            echo "</tr>";
        }
    ?>
    </table>

    <h1>Acer Laptop</h1>
    <a href="view-more.php?laptop_brand=Acer">View More Acer Laptops</a>
    <table>
    <?php
        $sql = "SELECT * FROM laptop WHERE laptop_brand = 'Acer' LIMIT 3";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<td>";
                ?>
                <div class="row">
                    <div class="column">
                        <img src="<?php echo $row['image']?>" alt="" width="250px" height="250px">
                        <h3><?php echo $row['laptop_model']?></h3>
                        <h4><?php echo "RS: ".$row['price']?></h4>
                        <a href="view-full-details.php?laptop_id=<?php echo $row['laptop_id']?>">Full Details</a>
                    </div>
                </div>
                <?php
                echo "</td>";
            }
            echo "</tr>";
        }
    ?>
    </table>

    <h1>MSI Laptop</h1>
    <a href="view-more.php?laptop_brand=MSI">View More MSI Laptops</a>
    <table>
    <?php
        $sql = "SELECT * FROM laptop WHERE laptop_brand = 'MSI' LIMIT 3";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<td>";
                ?>
                <div class="row">
                    <div class="column">
                        <img src="<?php echo $row['image']?>" alt="" width="250px" height="250px">
                        <h3><?php echo $row['laptop_model']?></h3>
                        <h4><?php echo "RS: ".$row['price']?></h4>
                        <a href="view-full-details.php?laptop_id=<?php echo $row['laptop_id']?>">Full Details</a>
                    </div>
                </div>
                <?php
                echo "</td>";
            }
            echo "</tr>";
        }
    ?>
    </table>
</body>
</html>