<?php
    require "../resources/config.php";
    session_start();
    if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>
    <?php require "header.php";?>
    <style>
        .container{
            margin-top: 30px;
        }
        a:hover{
            text-decoration: none;
        }
    </style>
    <div class="container">
        <h1><?php echo ucfirst($_SESSION['first_name'])?>'s Wishlist</h1>
    </div>
    <div class="container">
                <?php 
                    $sql = "SELECT * FROM wishlist WHERE customer_id = '$_SESSION[customer_id]'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                ?>
                <table class="table table-striped text-left">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                <?php
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td><a href='view-full-details.php?laptop_id=$row[item_id]'>{$row['item_name']}</a></td>";
                        echo "<td><img src='$row[image]' width='100' height='100'></td>";
                        $price = number_format($row['price'], 2);
                        echo "<td>Rs: {$price}</td>";
                        echo "<td><a href='user-wishlist-remove-item.php?item_id=$row[item_id]'>Delete</a></td>";
                        echo "</tr>";
                        }
                    }else{
                ?>
                    <div class="container">
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Your wishlist is empty!</h4>
                            <hr>
                            <p class="mb-0">Don't miss out on great deals! Start shopping or log in to view products added.</p>
                        </div>
                    </div>
                <?php
                    }
                ?>
    </div>
<?php
    }else{
        header("Location: user.php");
        exit();
    }
?>