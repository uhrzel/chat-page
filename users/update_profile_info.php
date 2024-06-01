<?php
session_start();
require('conn.php'); // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];

    // Sanitize and validate input data
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    // Update user information in the database
    $query = "UPDATE users SET username='$username', address='$address' WHERE id='$user_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo '<script>alert("Updated Successfully "); window.location.href = "index.php";</script>';
        exit();
    } else {
        echo '<script>alert("Error updating profile information: ' . mysqli_error($con) . '");</script>';
    }
}
