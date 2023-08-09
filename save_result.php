<?php
// Initialize the session
session_start();
require_once "db_connection.php";

// Check if the request contains the quiz score
if (isset($_POST["score"])) {
    // Get the user ID from the session or any other relevant information you want to record
    $username = $_SESSION["username"]; // Replace "user_id" with the actual session variable storing user ID.

    // Get the quiz score from the AJAX request
    $quiz_id = $_POST['quiz_id'];
    $topic = $_POST['topic'];
    $quizScore = $_POST["score"];

    // Save the quiz result to the database

    // Prepare and execute the SQL query to insert the quiz result
    $stmt = $conn->prepare("INSERT INTO quiz_results (quiz_id, username, topic, quiz_score, quiz_completed) VALUES (?, ?, ?, ?, 1)"); // Set quiz_completed to 1 to indicate completion
    $stmt->bind_param("issi",$quiz_id, $username, $topic, $quizScore);
    $stmt->execute();

    // Close the connection
    $stmt->close();
    $conn->close();

    // Send a response back to the JavaScript (optional)
    echo "Quiz result recorded and marked as completed!";
} else {
    // Handle the case where the quiz score is not provided in the request.
    echo "Quiz score not provided!";
}
?>
