<?php
    require "../resources/config.php";

    $admin_id = $_GET['admin_id'];

    session_start();
    $_SESSION['admin_id'] = $admin_id;
    
    $sql = "SELECT * FROM admin WHERE admin_id = $admin_id";
    $result = mysqli_query($conn, $sql);
    while($row = $result->fetch_assoc()){
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Records</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Admin ID: </label><input type="text" name="admin_id" value = "<?php echo $admin_id?>"><br>
    </form>
</body>
</html>