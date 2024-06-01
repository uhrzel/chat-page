<?php
require('conn.php'); // Include your database connection script

// Check if user_id is provided via POST method
if (isset($_POST['user_id'])) {
    // Sanitize the user ID
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);

    // Check if new password is provided
    if (isset($_POST['new_password'])) {
        // Sanitize and hash the new password
        $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the password of the user
        $query = "UPDATE users SET password = '$hashed_password' WHERE id = '$user_id'";
        $result = mysqli_query($con, $query);

        if ($result) {
            // Redirect to a success page or display a success message
            echo '<script>alert("Reset Successfully"); window.location.href = "index.php";</script>';
            exit();
        } else {
            // Redirect to an error page or display an error message
            echo '<script>alert("Reset Unsuccessful"); window.location.href = "index.php";</script>';
            exit();
        }
    } else {
        // Redirect to an error page or display an error message if new password is not provided
        echo '<script>alert("Error Reseting password for User"); window.location.href = "index.php";</script>';
        exit();
    }
} else {
    // Redirect to an error page or display an error message if user_id is not provided
    header("Location: error_reset_password.php");
    exit();
}
