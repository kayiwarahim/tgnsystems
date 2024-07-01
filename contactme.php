<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 2; // Enable verbose debug output
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'tgnsystemslimited@gmail.com'; // SMTP username
        $mail->Password = 'eeiw ctky fugd wqha'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('tgnsystemslimited@gmail.com', 'TGN SYSTEMS LIMITED');
        $mail->addAddress('kayiwarahim@gmail.com', 'Kayiwa Rahim'); // Add a recipient
        $mail->addAddress('kayiwa.rahim@tgnsystems.org', 'Kayiwa Rahim'); // Add a recipient
        $mail->addAddress('admin@tgnsystems.org', 'admin'); // Add a recipient


        // Content
        $mail->isHTML(true);
        $mail->Subject = 'TGN SYSTEMS LIMITED';
        $mail->Body    = "Name: $name<br>Contact Number: $phone<br>Email: $email<br>Message: $message";
        //$mail->AltBody = "Name: $name\nContact Number: $phone\nEmail: $email\nMessage: $message";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
