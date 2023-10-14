<?php
// Start a session
session_start();

require_once 'config.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$username = $conn->real_escape_string($_POST['username']); // Use real_escape_string for security
$password = $conn->real_escape_string($_POST['password']); // Use real_escape_string for security

// Query the database to check user credentials
$query = "SELECT * FROM login WHERE UserName='$username' AND Password='$password'";
$result = $conn->query($query);

if ($result && $result->num_rows == 1) {
    // Successful login, redirect to your custom page
    $_SESSION['username'] = $username; // Store user information in the session

    // Record the login event
    $loginEventUsername = $username;
    recordLoginEvent($loginEventUsername, $conn);

    header("Location: custom_page.php");
} else {
    // Invalid login, redirect back to the login page
    header("Location: login.php?error=1");
}

// Function to record a login event with a timestamp
function recordLoginEvent($username, $conn) {
    $username = $conn->real_escape_string($username);
    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date('Y-m-d H:i:s'); // Get the current timestamp
    // Define the event type (login)
    $event_type = 'login';
    $sql = "INSERT INTO login_events (username, activity_time, event_type) VALUES ('$username', '$timestamp', '$event_type')";

    $result = $conn->query($sql);

    if (!$result) {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
