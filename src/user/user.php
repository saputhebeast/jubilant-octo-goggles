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
    <style>
        .dropbtn {
            background-color: #04AA6D;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #3e8e41;}

        .top-nav{
            margin-left: 10px;
        }
    </style>
    <div class="top-nav">
        <h1>Laptop Shop</h1>
        <div class="dropdown">
            <a href="#">
                <img src="https://img.icons8.com/material-outlined/24/000000/fast-cart.png"/>
            </a>
            <img src="https://img.icons8.com/ios-glyphs/30/000000/user--v1.png" class="dropbtn"/>
            <div class="dropdown-content">
                <a href="#">Login</a>
                <a href="#">Sign Up</a>
                <a href="#">Change Setting</a>
                <a href="#">Change Password</a>
            </div>
        </div>
    </div>
    
    <div class="nav">
        <a href="#">Laptops</a>
        <a href="#">Keyboard</a>
        <a href="#">Login</a>
        <a href="#">All Products</a>
        <div class="search-container">
            <form action="#">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <h1>Laptop Detail</h1>
    <table>
    <?php
        $sql = "SELECT * FROM laptop LIMIT 3";
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
</body>
</html>