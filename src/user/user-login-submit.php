<?php
    session_start();
    require_once('../resources/config.php');

    if(isset($_POST['email']) && isset($_POST['password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            return $data;
        }

        $email = validate($_POST['email']);
        $password = validate($_POST['password']);

        if(empty($email)){
            header('Location: user-login.php?error=email is required');
            exit();
        }else if(empty($password)){
            header('Location: user-login.php?error=password is required');
            exit();
        }else{
    
            $sql = "SELECT * FROM customer WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['email'] == $email && $row['password'] == $password) {
                    $_SESSION['first_name'] = $row['first_name'];
                    $_SESSION['last_name'] = $row['last_name'];
                    $_SESSION['customer_id'] = $row['customer_id'];
                    $_SESSION['email'] = $row['email'];
                    header('Location: user.php');
                }else{
                    header('Location: user-login.php?error=Incorrect email or password');
                    exit();
                }
            }else{
                header('Location: user-login.php?error=Incorrect email or password');
                exit();
            }
        }
    }else{
        header("Location: user.php");
    }
?>