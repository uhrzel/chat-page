<?php
require('conn.php'); // Include your database connection script

// Check if user_id is provided via POST method
if (isset($_POST['user_id'])) {
    // Sanitize the user ID
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);

    // Update the status of the user to approved
    $query = "UPDATE users SET status = 'approved' WHERE id = '$user_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Redirect to a success page or display a success message
        echo '<script>alert("User Approve Successfully"); window.location.href = "index.php";</script>';
        exit();
    } else {
        // Redirect to an error page or display an error message
        echo '<script>alert("User Unable to Approve"); window.location.href = "index.php";</script>';
        exit();
    }
} else {
    // Redirect to an error page or display an error message if user_id is not provided
    header("Location: error_approve.php");
    exit();
}
