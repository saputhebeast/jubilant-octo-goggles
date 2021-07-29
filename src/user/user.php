<?php require "../resources/config.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>
</head>
<body>
    <style>
        table{
            width: 100%;
            text-align: center;
        }
    </style>
    <style>
        * {box-sizing: border-box;}

        body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        }

        .nav {
        overflow: hidden;
        background-color: #e9e9e9;
        }

        .nav a {
        float: left;
        display: block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        }

        .nav a:hover {
        background-color: #ddd;
        color: black;
        }

        .nav .search-container {
        float: right;
        }

        .nav input[type=text] {
            width: 300px;
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
        }

        .nav .search-container button {
        float: right;
        padding: 6px 10px;
        margin-top: 8px;
        margin-right: 16px;
        background: #ddd;
        font-size: 17px;
        border: none;
        cursor: pointer;
        }

        .nav .search-container button:hover {
        background: #ccc;
        }
    </style>
    
    <div class="nav">
        <a href="#">Home</a>
        <a href="#">Laptops</a>
        <a href="#">Keyboards</a>
        <a href="#">Mouse</a>
        <a href="#">All Products</a>
        <a href="#">Login</a>
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