<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Admin Login</h2>
        <form action="./auth/admin_login.php" method="post">
            <label for="admin_username">Admin Username:</label>
            <input type="text" id="admin_username" name="admin_username" required>
            <label for="admin_password">Admin Password:</label>
            <input type="password" id="admin_password" name="admin_password" required>
            <button type="submit">Login</button>
        </form>
        <a href="index.php">User Login</a>
    </div>
</body>

</html>