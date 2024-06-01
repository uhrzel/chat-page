<?php
require('conn.php'); // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user ID from session or wherever it's stored
    $user_id = 1; // Assuming the user ID is 1

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
