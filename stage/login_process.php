<?php
// Start a session
session_start();

require_once 'config.php';

$host = getenv('DB_HOST');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_DATABASE');

$conn = pg_connect("host=$host dbname=$database user=$username password=$password");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Get user input
$username = pg_escape_string($_POST['username']); // Use pg_escape_string for security
$password = pg_escape_string($_POST['password']); // Use pg_escape_string for security

// Query the database to check user credentials
$query = "SELECT * FROM login WHERE UserName='$username' AND Password='$password'";
$result = pg_query($conn, $query); // Use pg_query for PostgreSQL

if ($result && pg_num_rows($result) == 1) {
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
    $username = pg_escape_string($username);
    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date('Y-m-d H:i:s'); // Get the current timestamp
    // Define the event type (login)
    $event_type = 'login';
    $sql = "INSERT INTO login_events (username, activity_time, event_type) VALUES ('$username', '$timestamp', '$event_type')";

    $result = pg_query($conn, $sql);

    if (!$result) {
        echo "Error: " . pg_last_error($conn);
    }
}

pg_close($conn);
?>
