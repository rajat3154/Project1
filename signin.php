<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $email = $_POST['mailid'];
    $password = $_POST['password'];

    // Connecting to the Database
    $servername = "localhost";
    $username = "root";
    $db_password = ""; 
    $database = "useraccount";
    // Create a connection
    $conn = mysqli_connect($servername, $username, $db_password, $database);
    // Die if connection was not successful
    if (!$conn) {
        die("Sorry we failed to connect: " . mysqli_connect_error());
    } else {
        // SQL query to check if user exists with the entered credentials
        $sql = "SELECT * FROM `users` WHERE `Email`='$email' AND `Password`='$password'";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);

        if ($numRows == 1) {
            // User exists, redirect to home.html or any other page
            $_SESSION['email'] = $email; // Store user's email in session for future use
            header("Location: index.html"); // Redirect to home.html
            exit(); // Stop further execution
        } else {
            // User does not exist or credentials are incorrect
            echo '<div style="color: red; text-align: center;">Invalid credentials. Please try again.</div>';
        }
    }
}
?>
