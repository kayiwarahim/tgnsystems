<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0; // Change this to 0 to hide the debug output
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'tgnsystemslimited@gmail.com'; // SMTP username
        $mail->Password = 'eeiw ctky fugd wqha'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('your_email@gmail.com', 'TGN SYTEMS');
        //$mail->addAddress('kayiwarahim@gmail.com', 'Kayiwa Rahim'); // Add the first recipient
        $mail->addAddress('kayiwa.rahim@tgnsystems.org', 'Kayiwa Rahim'); // Add the second recipient
        $mail->addAddress('admin@tgnsystems.org', 'Admin'); // Add the third recipient
        

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Clients contact submission';
        $mail->Body    = "Name          : $name<br>
                          Contact Number: $phone<br>
                          Email         : $email<br>
                          Message       : $message";
        //$mail->AltBody = "Name: $name\nContact Number: $phone\nEmail: $email\nMessage: $message";

        $mail->send();
        $response['status'] = 'success';
        $response['message'] = 'Message has been sent successfully!';
       // echo 'Message has been sent';

        // Redirect to the home page after 2 seconds
        //header("Refresh: 0; URL=index.html#contact"); // Change 'index.php' to your actual home page URL
        //exit();
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    echo json_encode($response);
    exit();

}
?>
