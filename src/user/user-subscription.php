<?php
    require "../resources/config.php";

    if (isset($_POST['subscribe'])){
        $subscriberMail = $_POST['subscriberMail'];
        $sql = "SELECT * FROM newsletter WHERE email = '$subscriberMail'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
            echo "<script type='text/javascript'>";
            echo "alert('Already Subscribed!');";
            echo "window.location.href = 'user.php'";
            echo "</script>";
        }else{
            $sql = "INSERT INTO newsletter(email) VALUES('$subscriberMail');";
            $result = mysqli_query($conn, $sql);

            echo "<script type='text/javascript'>";
            if ($result){
                echo "alert('Subscribed!');";
            }else{
                echo "alert('Not Subscribed!');";
            }
            echo "window.location.href = 'user.php'";
            echo "</script>";
        }
    }