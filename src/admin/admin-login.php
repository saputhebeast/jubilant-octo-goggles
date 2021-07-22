<?php
    session_start();
    require_once('../resources/config.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email)){
        header('Location: admin.php?error=email is required');
        exit();
    }else if(empty($password)){
        header('Location: admin.php?error=password is required');
        exit();
    }else{

        $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] == $email && $row['password'] == $password) {
                $_SESSION['username'] = $row['first_name'];
                $_SESSION['admin_id'] = $row['admin_id'];
                header('Location: admin-dashboard.php');
            }else{
                header('Location: admin.php?error=Incorrect email or password');
                exit();
            }
        }else{
            header('Location: admin.php?error=Incorrect email or password');
            exit();
        }
    }
?>