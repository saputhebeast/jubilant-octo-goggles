<?php
    require "../resources/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require "header.php"?>
    <?php
        $laptop_brand = $_GET['laptop_brand'];
        echo $laptop_brand;
    ?>
</body>
</html>