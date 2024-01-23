<?php
// Start a session
session_start();

require_once 'config.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$username = $_POST['username'];
$password = $_POST['password'];

// Create a prepared statement
$query = "SELECT * FROM login WHERE UserName = ? AND Password = ?";
$stmt = $conn->prepare($query);

if (!$stmt) {
    die("Error in preparing the statement: " . $conn->error);
}

// Bind the parameters
$stmt->bind_param("ss", $username, $password);

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows == 1) {
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
    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date('Y-m-d H:i:s'); // Get the current timestamp
    // Define the event type (login)
    $event_type = 'login';
    $sql = "INSERT INTO login_events (username, activity_time, event_type) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error in preparing the statement: " . $conn->error;
        return;
    }

    $stmt->bind_param("sss", $username, $timestamp, $event_type);
    if ($stmt->execute()) {
        // Success
        $stmt->close();
    } else {
        echo "Error: " . $stmt->error;
    }
}

$conn->close();
?>
