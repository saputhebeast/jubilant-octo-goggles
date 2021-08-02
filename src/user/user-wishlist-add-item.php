<?php
    session_start();
    require "../resources/config.php";
    if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){

        if (isset($_POST['wishlist'])) {
            $customer_id = $_SESSION['customer_id'];
            $item_id = $_GET['item_id'];
            
            $sql = "SELECT laptop_model, image, price FROM laptop WHERE laptop_id = '$item_id';";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $item_name = $row['laptop_model'];
                    $price = $row['price'];
                    $image = $row['image'];
                }
            }
        }

        $sql = "INSERT INTO wishlist(customer_id, item_id, item_name, image, price) VALUES('$customer_id', '$item_id', '$item_name', '$image', '$price');";
        mysqli_query($conn, $sql);
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script type='text/javascript'>";
            echo "alert('Item Added to The Wishlist');";
            echo "window.location.href = 'user.php'";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('Not Added Item to The Wishlist');";
            echo "window.location.href = 'user.php'";
            echo "</script>";
        }
    }else{
        header("Location: user.php");
        exit();
    }
?>