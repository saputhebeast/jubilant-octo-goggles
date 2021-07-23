<?php
    require "../resources/config.php";
    session_start();

    if(isset($_SESSION['admin_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
?>

<?php
    $admin_id = $_SESSION['admin_id'];

    $sql = "SELECT * FROM admin WHERE admin_id = '$admin_id';";
    $result = mysqli_query($conn, $sql);
    
    $row = $result->fetch_assoc();
    $password = $row['password'];
    
    $oldPassword = $_POST['old-password'];
    $newPassword = $_POST['new-password'];
    $confirmNewPassword = $_POST['confirm-new-password'];

    if (($oldPassword === $password) && ($newPassword === $confirmNewPassword)) {
        echo "changed password";
    }elseif ($newPassword !== $confirmNewPassword) {
        header("Location: admin-manage-password.php?error=new password and confirm new password doesn't match");
        exit();
    }elseif($password !== $oldPassword){
        header("Location: admin-manage-password.php?error=incorrect old password");
        exit();
    }
?>

<?php
    }else{
        header("Location: admin.php");
        exit();
    }
?>