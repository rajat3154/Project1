<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $servername = "localhost";
    $username = "root";
    $db_password = ""; 
    $database = "useraccount"; 

    $conn = mysqli_connect($servername, $username, $db_password, $database);

    if (!$conn) {
        die("Sorry we failed to connect: " . mysqli_connect_error());
    } else {
        $email = mysqli_real_escape_string($conn, $email); // Sanitize input
        $password = mysqli_real_escape_string($conn, $password); // Sanitize input

        $sql = "SELECT * FROM `users` WHERE `Email` = '$email' AND `Password` = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            // Valid credentials, redirect to index.html
            header("Location: index.html");
            exit();
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Invalid email or password. Please try again!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                  </div>';
        }
    }
}
?>
