<?php
    session_start();
    if (isset($_SESSION['customer_id'])) {
        session_destroy();
        echo "<script>location.href='user.php'</script>";
    }else{
        echo "<script>location.href='user.php'</script>";
    }
?>