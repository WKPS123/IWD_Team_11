<?php
session_start(); // Start the session if it's not already started

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

require "../db_connection.php"; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["next_chapter"])) {
        $topic_id = $_POST["next_chapter"]; // Get the selected topic ID
        $username = $_SESSION["username"];
        $progress = 100; // Set the progress to 100
        
        // Define an array to map topic IDs to their names
        $topicNames = [
            1 => "Dementia Symptoms",
            2 => "How to Communicate with a person with dementia",
            3 => "Dealing with the troubling behavior of a person with dementia"
        ];
        
        // Get the topic name based on the selected topic ID
        $topic_name = $topicNames[$topic_id];
        
        // Prepare and execute the SQL query to update or insert progress
        $sql = "INSERT INTO user_progress (username, topic_id, topic_name, progress) 
                VALUES (?, ?, ?, ?) 
                ON DUPLICATE KEY UPDATE progress = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sissi", $username, $topic_id, $topic_name, $progress, $progress);
        $stmt->execute();

        // Close the statement and the database connection
        $stmt->close();
        $conn->close();

        // Redirect to the appropriate page based on the selected topic
        if ($topic_id == 1) {
            header("Location: communication.php");
        } elseif ($topic_id == 2) {
            header("Location: dealing.php");
        } elseif ($topic_id == 3) {
            header("Location: ../certificate.php");
        }
        exit;
    }
}
?>
