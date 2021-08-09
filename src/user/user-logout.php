<?php
    session_start();
    if (isset($_SESSION['customer_id'])) {
//        session_destroy()
        unset($_SESSION['customer_id']);
        unset($_SESSION['first_name']);
        unset($_SESSION['last_name']);
        unset($_SESSION['email']);
    }
echo "<script>location.href='user.php'</script>";
?>