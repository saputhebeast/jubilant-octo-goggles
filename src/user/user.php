<?php 
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
    <style>
        img {
            display:block;
            margin:auto;
        }
        .btn a{
            text-decoration: none;
            color: black;
        }
        .btn a:hover{
            text-decoration: none;
            color: white;
        }
        .container{
            margin-top: 10px;
            padding-top: 10px;
        }
        .more-details{
            margin-top: 20px;
        }
        .col{
            border: 2px solid black;
        }
    </style>

    <?php require "header.php"?>
    
    <div class="laptop">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-left">Asus Laptops</h1>
                </div>
                <div class="col">
                    <div style="text-align:right">
                        <button class="btn btn-outline-secondary"><a href="view-more.php?laptop_brand=Acer" class="text-right">View More Asus Laptops</a></button>
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
                        <div class="row">
                            <div class="column">
                                <img src="<?php echo $row['image']?>" alt="" width="250px" height="250px">
                                <h4 class="text-center"><?php echo $row['laptop_model']?></h4>
                                <h5 class="text-center"><?php echo "RS: ".number_format($row['price'], 2)?></h5>
                                <div class="more-details" style="text-align:center">
                                    <button class="btn btn-outline-danger"><a href="view-full-details.php?laptop_id=<?php echo $row['laptop_id']?>">Full Details</a></button>
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
</body>
</html>