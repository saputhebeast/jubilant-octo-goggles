<?php
require "../resources/config.php";
$mouse_brand = $_GET['mouse_brand'];
if ($mouse_brand == 'Asus') {
    $tagline = 'Inspiring Innovation • Persistent Perfection';
} else if ($mouse_brand == 'Logitech') {
    $tagline = 'Get in shape and innovate';
} else if ($mouse_brand == 'Razer') {
    $tagline = 'For Gamers. By Gamers';
}else if ($mouse_brand == 'SteelSeries') {
    $tagline = 'Winning Is Everything';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/user/user.css">
    <title><?php echo $mouse_brand?> Laptops</title>
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

<div class="jumbotron jumbotron-fluid bg-muted">
    <div class="container">
        <h1 class="display-4"><?php echo $mouse_brand?> Laptops</h1>
        <p class="lead"><?php echo $tagline?></p>
    </div>
</div>

<!-- all laptop -->
<div class="laptop">
    <div class="container">
        <?php
        $sql = "SELECT * FROM mouse WHERE mouse_brand = '$mouse_brand'";
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