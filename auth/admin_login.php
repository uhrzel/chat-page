<?php
require('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = mysqli_real_escape_string($con, $_POST['admin_username']);
    $admin_password = mysqli_real_escape_string($con, $_POST['admin_password']);


    $query = "SELECT * FROM admin WHERE username='$admin_username' AND password='$admin_password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        header("Location: /messaging/admin/index.php");
        exit();
        /*   echo '<script>window.location.href = "/messaging/admin/index.php";</script>'; */
    } else {
        echo "Invalid admin username or password.";
    }
}
