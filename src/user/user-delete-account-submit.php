<?php
    require "../resources/config.php";

    session_start();
    if(isset($_SESSION['customer_id']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])){
        $customer_id = $_SESSION['customer_id'];
        if (isset($_POST['delete_account'])){
            $confirmation_text = $_POST['confirmation'];
            if ($confirmation_text === 'Delete My Account') {
                $sql = "DELETE FROM customer WHERE customer_id='$customer_id'";
                mysqli_query($conn, $sql);
                if (mysqli_affected_rows($conn) > 0) {
                    unset($_SESSION['customer_id']);
                    unset($_SESSION['first_name']);
                    unset($_SESSION['last_name']);
                    unset($_SESSION['email']);
                    echo "<script>alert('Account deleted successfully!')</script>";
                    echo "<script>location.href='user.php'</script>";
                } else {
                    echo "<script type='text/javascript'>";
                    echo "alert('Can't Delete Your Account');";
                    echo "window.location.href = 'user.php'";
                    echo "</script>";
                }
            }else {
                header("Location: user-delete-account.php?error=check confirmation text");
            }
        }
    }else{
        header("Location: user.php");
        exit();
    }