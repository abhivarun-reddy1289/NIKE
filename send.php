<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mailServer/Exception.php';
require 'mailServer/PHPMailer.php';
require 'mailServer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $address = htmlspecialchars($_POST["address"]);
    $messageText = htmlspecialchars($_POST["message"]);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'royalreddys1289@gmail.com'; // Replace with your email
        $mail->Password   = 'canmdpwmizqxzbca';    // App password from Google
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('royalreddys1289@gmail.com', 'Contact Form');
        $mail->addAddress('abhivarun08@gmail.com');

        // Content
        $mail->isHTML(false);
        $mail->Subject = 'New Contact Form Message';
        $mail->Body    = "Name: $name\nAddress: $address\n\nMessage:\n$messageText";

        $mail->send();
        header("Location: contact.html?sent=1");
        exit;

        echo "Message sent successfully!";
    } catch (Exception $e) {
        echo "Failed to send message. Error: {$mail->ErrorInfo}";
    }
}
?>
