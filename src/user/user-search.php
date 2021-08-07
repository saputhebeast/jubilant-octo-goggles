<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Result</title>
</head>
<?php
    require "../resources/config.php";
    require "header.php";
    if (isset($_POST['search'])){
        $keyword = mysqli_real_escape_string($conn, $_POST['keyword']);

        $sql = "SELECT * FROM laptop WHERE 
                           laptop_brand LIKE '%$keyword%' 
                        OR laptop_model LIKE '%$keyword%' 
                        OR processor LIKE '%$keyword%' 
                        OR processor_model LIKE '%$keyword%' 
                        OR gpu LIKE '%$keyword%' 
                        OR ram LIKE '%$keyword%' 
                        OR laptop_storage LIKE '%$keyword%' 
                        OR refresh_rate LIKE '%$keyword%' 
                        OR display_resolution LIKE '%$keyword%'";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        if($queryResult > 0){
            ?>
            <div class="container">
                <a href="user.php" class="btn btn-link ">Go Back to Home</a>
            </div>
            <?php
            while ($row = mysqli_fetch_assoc($result)){
                ?>
                <div class="container">
                    <div class="card">
                        <div class="card-header"><?php echo $row['laptop_brand']?></div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['laptop_model']?></h5>
                            <img src="<?php echo $row['image']?>" width="150" height="150" alt="<?php echo $row['laptop_brand']?>">
                            <p class="card-text"><?php echo $row['about_laptop']?></p>
                            <a href="view-full-laptop-details.php?laptop_id=<?php echo $row['laptop_id']?>" target="_blank" class="btn btn-primary">More Details</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        }else{
            echo "<div class='container'><p class='alert alert-danger text-center'>Not found a search result</p></div>";
        }
    }
?>
<style>
    .container{
        margin-top: 30px;
        margin-bottom: 30px;
    }
</style>

