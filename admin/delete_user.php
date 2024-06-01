<?php
require('conn.php'); // Include your database connection script

// Check if user_id is provided via POST method
if (isset($_POST['user_id'])) {
    // Sanitize the user ID
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);

    // Delete the user from the database
    $query = "DELETE FROM users WHERE id = '$user_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo '<script>alert("User Deleted Successfully"); window.location.href = "index.php";</script>';
        exit();
    } else {
        // Redirect to an error page or display an error message
        echo '<script>alert("User Unable to Delete "); window.location.href = "index.php";</script>';
        exit();
    }
} else {
    // Redirect to an error page or display an error message if user_id is not provided
    header("Location: error_delete.php");
    exit();
}
