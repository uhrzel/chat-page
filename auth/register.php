<?php
require('conn.php'); // Your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    // Check if the username already exists
    $check_query = "SELECT * FROM users WHERE username = '$username'";
    $check_result = mysqli_query($con, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        // Username already exists, show error message
        echo '<script>alert("Username already exists!"); window.location.href = "../register_users.php";</script>';
        exit(); // Stop further execution
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user
    $query = "INSERT INTO users (username, firstname, lastname, address, password) VALUES ('$username', '$firstname', '$lastname', '$address', '$hashed_password')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo '<script>alert("User Registered Successfully"); window.location.href = "../index.php";</script>';
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
