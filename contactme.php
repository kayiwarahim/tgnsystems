<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/src/SMTP.php';
    require 'vendor/autoload.php';

    if (isset($_POST['Submit'])) {
        
        //$name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

            $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
            $mail->Username   = 'tgnsystemslimited@gmail.com';          //SMTP username
            $mail->Password   = 'sqcofhekttgcpxuot';                    //SMTP password

            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('tgnsystemslimited@gmail.com', 'TGN SYSTMES');
            $mail->addAddress('tgnsystemslimited@gmail.com', 'TGN SYSTMES'); //Add a recipient
            
            /*$mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');

            //Attachments
            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name*/

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'SAMPLE';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>'; // Corrected semicolon

            /*$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';*/

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }   
    } else {
        header('location: index.html');
        exit(0);
    }
?>
