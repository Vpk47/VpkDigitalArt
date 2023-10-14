<?php
// Start a session
session_start();

require_once 'config.php';

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // Get the username from the session
    $username = $_SESSION['username'];

    // Record the logout event
    recordLogoutEvent($username);

    // Destroy the session
    session_destroy();
}

// Redirect the user to the login page or any other desired page
header("Location: index.php"); // Replace "login.php" with the URL of your login page
exit;

// Function to record a logout event with a timestamp
function recordLogoutEvent($username) {
    // Database connection settings (replace with your Hostinger MySQL credentials)
    require_once 'config.php';

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the current timestamp
    $timestamp = date('Y-m-d H:i:s');

    // Define the event type (logout)
    $event_type = 'logout';

    // Create a prepared statement
    $stmt = $conn->prepare("INSERT INTO login_events (username, logout_time, event_type) VALUES (?, ?, ?)");

    if ($stmt === false) {
        die("Error in preparing the statement: " . $conn->error);
    }

    // Bind parameters and execute the statement
    if ($stmt->bind_param("sss", $username, $timestamp, $event_type) && $stmt->execute()) {
        // Success
        $stmt->close();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $conn->close();
}
?>
