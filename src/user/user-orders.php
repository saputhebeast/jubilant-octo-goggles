<?php
    session_start();
    require "../resources/config.php";
    if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>
    <?php require "header.php";?>
    <style>
        .container{
            margin-top: 30px;
        }
    </style>
    <div class="container">
        <h1><?php echo ucfirst($_SESSION['first_name'])?>'s Orders</h1>
    </div>

    <div class="order-items">
        <div class="container">
            <?php
                $sql = "SELECT * FROM item_order WHERE order_customer_id = '$_SESSION[customer_id]'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
            ?>
            <table class="table table-striped text-left">
                <tr>
                    <thead>
                        <th>Order Id</th>
                        <th>Item Name</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                    </thead>
                </tr>
            <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['order_id']}</td>";
                        echo "<td>{$row['order_item_name']}</td>";
                        echo "<td><img src='$row[order_item_image]' width='100' height='100'></td>";
                        echo "<td>{$row['order_quantity']}</td>";
                        $price = number_format($row['order_total_price'], 2);
                        echo "<td>Rs: {$price}</td>";
                        echo "<td>{$row['order_status']}</td>";
                        echo "</tr>";
                    }
            ?>
            </table>
            <?php
                }else{
            ?>
                <div class="container">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">You haven't made any order yet!</h4>
                    <hr>
                    <p class="mb-0">Don't miss out on great deals! Start shopping or log in to view products added.</p>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
<?php
    }else{
        header("Location: user.php");
        exit();
    }
?>