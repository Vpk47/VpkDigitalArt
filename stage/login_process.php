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

// Connection is successful



// Get user input
$username = $_POST['username'];
$password = $_POST['password'];

// Query the database to check user credentials
$query = "SELECT * FROM login WHERE UserName='$username' AND Password='$password'";
$result = $conn->query($query);

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
    $username = mysqli_real_escape_string($conn, $username);
    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date('Y-m-d H:i:s'); // Get the current timestamp
    // Define the event type (logout)
    $event_type = 'login';
    $sql = "INSERT INTO login_events (username, activity_time, event_type) VALUES ('$username', '$timestamp', '$event_type')";

    
    if ($conn->query($sql) === TRUE) {
        echo "Login event recorded successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
