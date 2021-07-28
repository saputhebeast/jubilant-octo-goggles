<?php require "../resources/config.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Laptop Detail</h1>
    <?php
        $sql = "SELECT * FROM laptop";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="<?php echo $row['image']?>" alt="" width="250px" height="250px">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $row['laptop_brand']?></h2>
                            <h4 class="card-title"><?php echo $row['laptop_model']?></h4>
                            <p class="card-text">
                                <?php echo $row['about_laptop']?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    ?>
</body>
</html>