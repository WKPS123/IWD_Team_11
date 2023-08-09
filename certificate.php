<?php
session_start();
require("fpdf/fpdf.php");

require "db_connection.php";

// Function to fetch username from the database based on the user ID (replace 'user_id' with your actual column name)
function getUsernameFromDatabase($conn, $user_id) {
    $sql = "SELECT username FROM users WHERE user_id = $user_id"; // Adjust the table name and column names as needed
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['username'];
    } else {
        return "Unknown User";
    }
}

// Replace this with the user ID of the user you want to generate the certificate for
$user_id = $_SESSION['user_id'];

// Get the username from the database
$username = getUsernameFromDatabase($conn, $user_id);

// Create the image
$font = "includes/Tahoma.ttf";
$time = time();
$image = imagecreatefromjpeg("img/certificate.jpg");
$color = imagecolorallocate($image, 19, 21, 22);
imagettftext($image, 40, 0, 325, 390, $color, $font, $username); // Use the fetched username here
imagejpeg($image, "download-certificate/$time.jpg");
imagedestroy($image);

// Generate the PDF
$pdf = new FPDF();
$pdf->AddPage('L', 'A5');
$pdf->Image("download-certificate/$time.jpg", 0, 0, 210, 148);
$pdf->Output(); // Set the content-type header to 'application/pdf' and force download the PDF

// Close the database connection
$conn->close();
?>
