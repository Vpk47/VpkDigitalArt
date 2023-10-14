<?php
session_start();

require_once 'config.php';

$host = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_NAME');

$conn = pg_connect("host=$host dbname=$database user=$username password=$password");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    recordLogoutEvent($username, $conn);
}

// Redirect the user to the login page
header("Location: login.php");

function recordLogoutEvent($username, $conn) {
    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date('Y-m-d H:i:s');
    $event_type = 'logout';
    $username = pg_escape_string($username);
    $sql = "INSERT INTO login_events (username, activity_time, event_type) VALUES ('$username', '$timestamp', '$event_type')";

    $result = pg_query($conn, $sql);

    if ($result) {
        // Destroy the session
        session_destroy();
    } else {
        // Handle the error gracefully
        // You can log the error, display an error message, or redirect the user to an error page
        session_destroy();
        header("Location: index.php");
    }

    pg_close($conn);
}
?>
