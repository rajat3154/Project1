<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect("localhost", "root", "", "recipes2");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $recipename = mysqli_real_escape_string($conn, $_POST['recipeName']);
    $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
    $recipeprocedure = mysqli_real_escape_string($conn, $_POST['procedure']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);

    $sql = "INSERT INTO `recipes2` (recipename, ingredients, recipeprocedure, username)
            VALUES ('$recipename', '$ingredients', '$recipeprocedure', '$username')";

    if (mysqli_query($conn, $sql)) {
        echo "New recipe inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
