<?php

require "db_connection.php";

// Step 3: Extracted data from the HTML code
$topics = array(
    array(1, "Dementia Symptoms", "chapter/Symptoms.php"),
    array(2, "Tips for communicating with a person with Dementia", "chapter/communication.php"),
    array(3, "Dealing with the troubling behavior of a person with dementia", "chapter/dealing.php"),
);


// Step 6: Insert the data into the database
foreach ($topics as $topic) {
    $topic_id = $topic[0];
    $topic_name = $topic[1];
    $topic_url = $topic[2];

    $sql = "INSERT INTO topics (topic_id, topic_name, topic_url) VALUES ('$topic_id', $topic_name', '$topic_url')";

    if ($conn->query($sql) === TRUE) {
        echo "Topic '$topic_name' inserted successfully.<br>";
    } else {
        echo "Error inserting topic: " . $conn->error . "<br>";
    }
}

// Close the database connection
$conn->close();
?>
