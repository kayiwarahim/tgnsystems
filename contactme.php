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
        $mail->setFrom('your_email@gmail.com', 'TGN SYTEMS <svg class="verified-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
            <path fill="#1DA1F2" d="M12 0C5.37 0 0 5.37 0 12s5.37 12 12 12 12-5.37 12-12S18.63 0 12 0zm-1.06 18.26l-4.5-4.5 1.41-1.41L11 15.34l7.09-7.09 1.41 1.41-8.56 8.56z"/>
        </svg>');
        $mail->addAddress('kayiwarahim@gmail.com', 'Kayiwa Rahim'); // Add the first recipient
        $mail->addAddress('kayiwa.rahim@tgnsystems.org', 'Kayiwa Rahim'); // Add the second recipient
        $mail->addAddress('sales@tgnsystems.org', 'Sales'); // Add the third recipient
        

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Clients contact submission';
        $mail->Body    = "<b>Name      </b>    : $name<br>
                          <b>Contact Number</b> : $phone<br>
                          <b>Email     </b>     : $email<br>
                          <b>Message  </b>      : $message";
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
