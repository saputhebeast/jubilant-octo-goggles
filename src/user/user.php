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
    <title>Home</title>
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

    <!-- Acer laptop -->
    <div class="laptop">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-left">Acer Laptops</h1>
                </div>
                <div class="col">
                    <div style="text-align:right">
                        <a href="view-more-laptop.php?laptop_brand=Acer" class="text-right btn btn-primary">View More Acer Laptops</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <?php
                $sql = "SELECT * FROM laptop WHERE laptop_brand = 'Acer' LIMIT 3";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<div class='row'>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='col'>";
                        ?>
                        <div class="card mb-3" style="width: 20rem;">
                            <div class="card text-center" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['laptop_model']?></h5>
                                <p class="card-text">
                                    <img src="<?php echo $row['image']?>" alt="" width="250px" height="250px">
                                    <?php echo "Rs: ".number_format($row['price'], 2)?>
                                </p>
                                <a href="view-full-details.php?laptop_id=<?php echo $row['laptop_id']?>" class="btn btn-primary">Full Details</a>
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

    <!-- Asus laptop -->
    <div class="laptop">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-left">Asus Laptops</h1>
                </div>
                <div class="col">
                    <div style="text-align:right">
                        <a href="view-more-laptop.php?laptop_brand=Asus" class="text-right btn btn-primary">View More Asus Laptops</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <?php
                $sql = "SELECT * FROM laptop WHERE laptop_brand = 'Asus' LIMIT 3";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<div class='row'>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='col'>";
                        ?>
                        <div class="card mb-3" style="width: 20rem;">
                            <div class="card text-center" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['laptop_model']?></h5>
                                <p class="card-text">
                                    <img src="<?php echo $row['image']?>" alt="" width="250px" height="250px">
                                    <?php echo "Rs: ".number_format($row['price'], 2)?>
                                </p>
                                <a href="view-full-details.php?laptop_id=<?php echo $row['laptop_id']?>" class="btn btn-primary">Full Details</a>
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

    <!-- MSI Laptop -->
    <div class="laptop">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-left">MSI Laptops</h1>
                </div>
                <div class="col">
                    <div style="text-align:right">
                        <a href="view-more-laptop.php?laptop_brand=MSI" class="text-right btn btn-primary">View More MSI Laptops</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <?php
                $sql = "SELECT * FROM laptop WHERE laptop_brand = 'MSI' LIMIT 3";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<div class='row'>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='col'>";
                        ?>
                        <div class="card mb-3" style="width: 20rem;">
                            <div class="card text-center" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['laptop_model']?></h5>
                                <p class="card-text">
                                    <img src="<?php echo $row['image']?>" alt="" width="250px" height="250px">
                                    <?php echo "Rs: ".number_format($row['price'], 2)?>
                                </p>
                                <a href="view-full-details.php?laptop_id=<?php echo $row['laptop_id']?>" class="btn btn-primary">Full Details</a>
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