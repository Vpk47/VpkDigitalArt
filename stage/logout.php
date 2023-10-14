<?php
session_start(); // Start the session

// Database connection settings (replace with your Hostinger MySQL credentials)
require_once 'config.php';

$host = getenv('DB_HOST');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_DATABASE');

$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    
    // Get the username from the session
    $username = $_SESSION['username'];
    
    // Record the logout event
    $logoutEventUsername = $username;
    recordLogoutEvent($logoutEventUsername, $conn);

}

// Redirect the user to the login page or any other desired page
 // Replace "login.php" with the URL of your login page
exit;

// Function to record a logout event with a timestamp
function recordLogoutEvent($username, $conn) {

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date('Y-m-d H:i:s'); 
    // Get the current timestamp
    
    // Define the event type (logout)
    $event_type = 'logout';

    // Insert the logout event into the login_events table
    $username = mysqli_real_escape_string($conn, $username);
    $sql = "INSERT INTO login_events (username, activity_time, event_type) VALUES ('$username', '$timestamp', '$event_type')";
    
    if ($conn->query($sql) === TRUE) {
        // Destroy the session
        session_destroy();
        header("Location: login.php");
    } else {
        // Destroy the session
        session_destroy();
        header("Location: index.php");
    }

    // Close the database connection
    $conn->close();
}
?>
