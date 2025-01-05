<?php

session_start(); // Start the session

require "assets/mailer/PHPMailer.php";
require "assets/mailer/SMTP.php";
require "assets/mailer/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $msg = $_POST["mesaj"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = ['type' => 'danger', 'text' => 'Invalid email address!'];
        header('Location: index.php'); // Redirect back to the form
        exit;
    }

    $msg = htmlspecialchars($msg, ENT_QUOTES, 'UTF-8');

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "Your Mail Adress"; // SMTP Mail
        $mail->Password = "Your Mail SMTP Password"; // SMTP application password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->CharSet = "UTF-8";
        $mail->Encoding = "base64";

        $mail->setFrom("oushansen@gmail.com", "Oğuz Şen");
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = "Thank You for Contacting Us!";
        $mail->Body = "Dear: ".$email."<br><br> Your message has reached us: ".$msg;

        $mail->send();
        $_SESSION['message'] = ['type' => 'success', 'text' => 'Mail sent successfully!'];
    } catch (Exception $e) {
        $_SESSION['message'] = ['type' => 'danger', 'text' => "Mail could not be sent! Error: {$mail->ErrorInfo}"];
    }

    header('Location: index.php'); // Redirect back to the form
    exit;
}
