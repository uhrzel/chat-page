<?php
require('conn.php'); // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user ID from session or wherever it's stored
    $user_id = 1; // Assuming the user ID is 1

    // Check if file was uploaded without errors
    if (isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"] == 0) {
        $file_name = $_FILES["profile_picture"]["name"];
        $file_tmp = $_FILES["profile_picture"]["tmp_name"];
        $file_type = $_FILES["profile_picture"]["type"];
        $file_size = $_FILES["profile_picture"]["size"];

        // Specify the directory where you want to save the uploaded file
        $upload_directory = __DIR__ . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;



        // Move the uploaded file to the specified directory
        if (move_uploaded_file($file_tmp, $upload_directory . $file_name)) {
            // Update user's profile picture in the database
            $query = "UPDATE users SET img ='$file_name' WHERE id='$user_id'";
            $result = mysqli_query($con, $query);

            if ($result) {
                // Redirect to the profile page after successful update
                echo '<script>alert("Updated Successfully "); window.location.href = "index.php";</script>';
                exit();
            } else {
                echo '<script>alert("Error updating profile picture: ' . mysqli_error($con) . '");</script>';
            }
        } else {
            echo '<script>alert("Error uploading profile picture.");</script>';
        }
    } else {
        echo '<script>alert("No file uploaded or an error occurred during upload.");</script>';
    }
}
