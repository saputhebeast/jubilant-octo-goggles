<?php
    session_start();
    require "../resources/config.php";
    if (isset($_POST['send'])) {
        $name = $_POST['contact_name'];
        $email = $_POST['contact_email'];
        $subject = $_POST['contact_subject'];
        $message = $_POST['contact_message'];

        $to = "laptopcartlk@gmail.com";
        $mail_subject = "Message from Website";
        $email_body = "Message From Contact Us Page of The Website: <br>";
        $email_body .= "From: {$email} ({$name})<br>";
        $email_body .= "Subject: {$subject} <br>";
        $email_body .= "Message: <br><br>".nl2br(strip_tags($message));
        $header = "From: {$email}\r\nContent-Type: text/html;";

        $send_mail_result = mail($to, $subject, $email_body, $header);

        if ($send_mail_result){
            header("Location: contact-us.php?status=success");
        }else{
            header("Location: contact-us.php?status=fail");
        }
    }