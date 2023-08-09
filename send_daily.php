<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Configure PHPMailer
$mailer = new PHPMailer(true);
$mailer->isSMTP();
$mailer->Host = 'smtp.gmail.com';
$mailer->Port = 465;
$mailer->SMTPAuth = true;
$mailer->Username = 'starright805@gmail.com';
$mailer->Password = 'ryfvmsohlbxmurlw';
$mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

// Connect to the database
$dbHost = 'localhost';
$dbName = 'dbdementia';
$dbUser = 'root';
$dbPass = '';

try {
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Retrieve email addresses of users
    $query = "SELECT email, username FROM users";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        $recipientEmail = $user['email'];
        $username = $user['username'];

        // Compose email
        $subject = 'Reminder: Login and Complete Your Reading Task';
        $message = "Hello $username,\n\nDon't forget to log in and complete your reading task today!\n\nBest regards,\nStarRight Team";

        // Set recipient and send email
        $mailer->setFrom('sender@example.com', 'StarRight');
        $mailer->addAddress($recipientEmail, $username);
        $mailer->Subject = $subject;
        $mailer->Body = $message;

        if (!$mailer->send()) {
            echo "Error sending email to $recipientEmail: " . $mailer->ErrorInfo . "\n";
        } else {
            echo "Email sent successfully to $recipientEmail\n";
        }

        // Clear addresses for the next iteration
        $mailer->ClearAddresses();
    }
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
}
