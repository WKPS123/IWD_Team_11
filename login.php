<?php
// Include config file
require "db_connection.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT user_id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                    
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = $id;
                            $_SESSION["username"] = $username;
                    
                            // Close statement
                            mysqli_stmt_close($stmt);
                            mysqli_close($conn);
                    
                            // Show a pop-up message using JavaScript
                            echo '<script>alert("You have been logged in successfully.");</script>';
                            echo "<script>window.open('home.php','_self')</script>";
                    
                            exit(); // It's a good practice to include an exit() after a header redirect to prevent further execution of PHP code.
                        } else{
                            // Password is not valid, display a generic error message
                            echo '<script>alert("Your login information invalid, Please try again.");</script>';
                            echo "<script>window.open('index.php','_self')</script>";
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}


// After successful login, fetch the user's reading progress from the database
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    // Assume $db_connection is your database connection object
    // Replace user_id with the actual column name in your database that stores the user's ID
    $user_id = $_SESSION["user_id"];

    // Fetch the reading progress for the logged-in user from the database
    $sql = "SELECT topic_id, completion_status FROM reading_progress WHERE user_id = ?";
    $stmt = $db_connection->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Initialize an array to store the reading progress
    $reading_progress = array();

    // Store the reading progress in the array
    while ($row = $result->fetch_assoc()) {
        $reading_progress[$row["topic_id"]] = $row["completion_status"];
    }

    // Store the reading progress array in the session
    $_SESSION["reading_progress"] = $reading_progress;
}
?>
 