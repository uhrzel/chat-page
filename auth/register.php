<?php
require('conn.php'); // Your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $password = mysqli_real_escape_string($con, $_POST['password']);


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $query = "INSERT INTO users (username, firstname, lastname, password) VALUES ('$username', '$firstname', '$lastname', '$hashed_password')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
