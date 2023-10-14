<?php
session_start();

require_once 'config.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
    $username = $conn->real_escape_string($username);
    $sql = "INSERT INTO login_events (username, activity_time, event_type) VALUES ('$username', '$timestamp', '$event_type')";

    if ($conn->query($sql) === TRUE) {
        // Destroy the session
        session_destroy();
    } else {
        // Handle the error gracefully
        // You can log the error, display an error message, or redirect the user to an error page
        session_destroy();
        header("Location: index.php");
    }

    $conn->close();
}
?>
