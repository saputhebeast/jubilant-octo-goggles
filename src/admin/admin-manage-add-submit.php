<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>

<?php
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['re-password'];

    if ((empty($first_name)) | (empty($last_name)) | (empty($email)) | (empty($password)) | (empty($confirmPassword))) {
        header("Location: admin-manage-add.php?error=empty blanks not valid");
        exit();
    }elseif($password !== $confirmPassword){
            header("Location: admin-manage-add.php?error=password and confirm password not matching");
            exit();
    }else{
        $sql = "INSERT INTO admin(first_name, last_name, email, password) VALUES('$first_name', '$last_name', '$email', '$password');";
        mysqli_query($conn, $sql);
        
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script type='text/javascript'>";
            echo "alert('Admin Added Successfully');";
            echo "window.location.href = 'admin-manage.php'";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('Not Added Successfully');";
            echo "window.location.href = 'admin-manage.php'";
            echo "</script>";
        }
    }
?>
<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>