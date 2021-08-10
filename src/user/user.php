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
                        <input type="button" class="btn btn-primary text-right" value=" View More Acer Laptops " onclick="window.location.href='view-more-laptop.php?laptop_brand=Acer'"/>
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
                                <a href="view-full-laptop-details.php?laptop_id=<?php echo $row['laptop_id']?>" class="btn btn-primary">Full Details</a>
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
                        <input type="button" class="btn btn-primary text-right" value=" View More Asus Laptops " onclick="window.location.href='view-more-laptop.php?laptop_brand=Asus'"/>
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
                        <input type="button" class="btn btn-primary text-right" value=" View More MSI Laptops " onclick="window.location.href='view-more-laptop.php?laptop_brand=MSI'"/>
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
                                <a href="view-full-laptop-details.php?laptop_id=<?php echo $row['laptop_id']?>" class="btn btn-primary">Full Details</a>
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

    <!-- Asus Keyboards -->
    <div class="keyboards">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-left">Asus Keyboards</h1>
                </div>
                <div class="col">
                    <div style="text-align:right">
                        <input type="button" class="btn btn-primary text-right" value=" View More Asus Keyboards " onclick="window.location.href='view-more-keyboard.php?keyboard_brand=Asus'"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <?php
            $sql = "SELECT * FROM keyboard WHERE keyboard_brand = 'Asus' LIMIT 3";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<div class='row'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col'>";
                    ?>
                    <div class="card mb-3" style="width: 20rem;">
                        <div class="card text-center" style="width: 20rem;">
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

    <!-- Corsair Keyboards -->
    <div class="keyboards">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-left">Corsair Keyboards</h1>
                </div>
                <div class="col">
                    <div style="text-align:right">
                        <input type="button" class="btn btn-primary text-right" value=" View More Corsair Keyboards " onclick="window.location.href='view-more-keyboard.php?keyboard_brand=Corsair'"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <?php
            $sql = "SELECT * FROM keyboard WHERE keyboard_brand = 'Corsair' LIMIT 3";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<div class='row'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col'>";
                    ?>
                    <div class="card mb-3" style="width: 20rem;">
                        <div class="card text-center" style="width: 20rem;">
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

    <!-- HyperX Keyboards -->
    <div class="keyboards">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-left">HyperX Keyboards</h1>
                </div>
                <div class="col">
                    <div style="text-align:right">
                        <input type="button" class="btn btn-primary text-right" value=" View More HyperX Keyboards " onclick="window.location.href='view-more-keyboard.php?keyboard_brand=HyperX'"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <?php
            $sql = "SELECT * FROM keyboard WHERE keyboard_brand = 'HyperX' LIMIT 3";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<div class='row'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col'>";
                    ?>
                    <div class="card mb-3" style="width: 20rem;">
                        <div class="card text-center" style="width: 20rem;">
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

    <!-- SteelSeries Keyboards -->
    <div class="keyboards">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-left">SteelSeries Keyboards</h1>
                </div>
                <div class="col">
                    <div style="text-align:right">
                        <input type="button" class="btn btn-primary text-right" value=" View More SteelSeries Mice " onclick="window.location.href='view-more-keyboard.php?keyboard_brand=SteelSeries'"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <?php
            $sql = "SELECT * FROM keyboard WHERE keyboard_brand = 'SteelSeries' LIMIT 3";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<div class='row'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col'>";
                    ?>
                    <div class="card mb-3" style="width: 20rem;">
                        <div class="card text-center" style="width: 20rem;">
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

    <!-- HyperX Keyboards -->
    <div class="keyboards">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-left">HyperX Keyboards</h1>
                </div>
                <div class="col">
                    <div style="text-align:right">
                        <input type="button" class="btn btn-primary text-right" value=" View More HyperX Keyboards " onclick="window.location.href='view-more-keyboard.php?keyboard_brand=HyperX'"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <?php
            $sql = "SELECT * FROM keyboard WHERE keyboard_brand = 'HyperX' LIMIT 3";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<div class='row'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col'>";
                    ?>
                    <div class="card mb-3" style="width: 20rem;">
                        <div class="card text-center" style="width: 20rem;">
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

    <!-- Asus Mice -->
    <div class="Mice">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-left">Asus Mice</h1>
                </div>
                <div class="col">
                    <div style="text-align:right">
                        <input type="button" class="btn btn-primary text-right" value=" View More Asus Mice " onclick="window.location.href='view-more-mouse.php?mouse_brand=Asus'"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <?php
            $sql = "SELECT * FROM mouse WHERE mouse_brand = 'Asus' LIMIT 3";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<div class='row'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col'>";
                    ?>
                    <div class="card mb-3" style="width: 20rem;">
                        <div class="card text-center" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['mouse_model']?></h5>
                                <p class="card-text">
                                    <img src="<?php echo $row['mouse_image']?>" alt="" width="250px" height="250px">
                                    <?php echo "Rs: ".number_format($row['mouse_price'], 2)?>
                                </p>
                                <a href="view-full-mouse-details.php?mouse_id=<?php echo $row['mouse_id']?>" class="btn btn-primary">Full Details</a>
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

    <!-- Logitech Mice -->
    <div class="Mice">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-left">Logitech Mice</h1>
                </div>
                <div class="col">
                    <div style="text-align:right">
                        <input type="button" class="btn btn-primary text-right" value=" View More Logitech Mice " onclick="window.location.href='view-more-mouse.php?mouse_brand=Logitech'"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <?php
            $sql = "SELECT * FROM mouse WHERE mouse_brand = 'Logitech' LIMIT 3";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<div class='row'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col'>";
                    ?>
                    <div class="card mb-3" style="width: 20rem;">
                        <div class="card text-center" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['mouse_model']?></h5>
                                <p class="card-text">
                                    <img src="<?php echo $row['mouse_image']?>" alt="" width="250px" height="250px">
                                    <?php echo "Rs: ".number_format($row['mouse_price'], 2)?>
                                </p>
                                <a href="view-full-mouse-details.php?mouse_id=<?php echo $row['mouse_id']?>" class="btn btn-primary">Full Details</a>
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

    <!-- SteelSeries Mice -->
    <div class="Mice">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-left">SteelSeries Mice</h1>
                </div>
                <div class="col">
                    <div style="text-align:right">
                        <input type="button" class="btn btn-primary text-right" value=" View More SteelSeries Mice " onclick="window.location.href='view-more-mouse.php?mouse_brand=SteelSeries'"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <?php
            $sql = "SELECT * FROM mouse WHERE mouse_brand = 'SteelSeries' LIMIT 3";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<div class='row'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col'>";
                    ?>
                    <div class="card mb-3" style="width: 20rem;">
                        <div class="card text-center" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['mouse_model']?></h5>
                                <p class="card-text">
                                    <img src="<?php echo $row['mouse_image']?>" alt="" width="250px" height="250px">
                                    <?php echo "Rs: ".number_format($row['mouse_price'], 2)?>
                                </p>
                                <a href="view-full-mouse-details.php?mouse_id=<?php echo $row['mouse_id']?>" class="btn btn-primary">Full Details</a>
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