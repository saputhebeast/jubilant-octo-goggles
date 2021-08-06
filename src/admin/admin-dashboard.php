<?php
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>

        <?php require "header.php"?>
    <h1>Hello, <?php echo $_SESSION['first_name']." ".$_SESSION['last_name']; ?></h1>

    <?php 
        $admins = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin"));
        $users = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM customer"));
        $laptops = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM laptop"));
    
        echo "<h1>Overview</h1>";
        echo "<h2>Number of Admins: {$admins}</h2>";
        echo "<h2>Number of Users: {$users}</h2>";
        echo "<h2>Number of Laptops: {$laptops}</h2>";
    ?>

</body>
</html>
<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>

