<?php
    require "../resources/config.php";

    $admin_id = $_GET['admin_id'];

    session_start();
    $_SESSION['admin_id'] = $admin_id;
    echo $_SESSION['admin_id'];
?>