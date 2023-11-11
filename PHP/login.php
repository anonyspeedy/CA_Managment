<?php
session_start(); // Start a PHP session

// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input from the login form
$username = $_POST['username'];
$password = $_POST['password'];

// Perform SQL query to validate the user
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Authentication successful
        $_SESSION['username'] = $username;
        header("Location: login.php"); // Redirect to a protected page
    } else {
        // Incorrect password
        echo "Incorrect password.";
    }
} else {
    // User not found
    echo "User not found.";
}

$conn->close();
?>
