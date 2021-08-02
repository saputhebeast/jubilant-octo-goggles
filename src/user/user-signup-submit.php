<?php
    require "../resources/config.php";
    session_start();
?>

<?php
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $street_address = $_POST['street_address'];
    $city = $_POST['city'];
    $postal_code = $_POST['postal_code'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['re-password'];

    if ((empty($first_name)) && (empty($last_name)) && (empty($street_address)) && (empty($city)) && (empty($postal_code)) && (empty($phone)) && (empty($email)) && (empty($password)) && (empty($confirmPassword))) {
        header("Location: user-signup.php?error=empty blanks not valid");
        exit();
    }elseif($password !== $confirmPassword){
            header("Location: user-signup.php?error=password and confirm password not matching");
            exit();
    }else{
        $sql = "INSERT INTO customer(first_name, last_name, street_address, city, postal_code, phone, email, password) VALUES('$first_name', '$last_name', '$street_address', '$city', '$postal_code', '$phone', '$email', '$password');";
        mysqli_query($conn, $sql);
        
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script type='text/javascript'>";
            echo "alert('Account Created Successfully');";
            echo "window.location.href = 'user-login.php'";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('Account Not Created Successfully');";
            echo "window.location.href = 'user-signup.php'";
            echo "</script>";
        }
    }
?>