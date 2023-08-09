<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

$email = $_POST['email'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';                      // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                  // Enable SMTP authentication
    $mail->Username   = 'starright805@gmail.com';            // SMTP username
    $mail->Password   = 'ryfvmsohlbxmurlw';                        // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           // Enable implicit TLS encryption
    $mail->Port       = 465;                                   // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // Recipients
    $mail->setFrom('from@example.com', 'StarRight');
    $mail->addAddress($email);                                 // Add the user-provided email as a recipient

        // Content
    $mail->isHTML(true);                                       // Set email format to HTML
    $mail->Subject = 'StarRight Company';
    $mail->Body    = 'Here is an invitation for you to join our course. "website:http://localhost/starright/index.php"';

    $mail->send();
    echo "<script>alert('Message Has Been Sent')</script>";
    echo "<script>window.open('home.php','_self')</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
