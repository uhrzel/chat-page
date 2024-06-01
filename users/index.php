<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: ../login.php");
    exit();
}

// Access user information from session
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

// Now you can use $user_id and $username to personalize the page for the logged-in user
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .navigation {
            margin-bottom: 20px;
        }

        .navigation ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .navigation li {
            display: inline;
            margin-right: 20px;
        }

        .navigation li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .navigation li a:hover {
            color: #4CAF50;
        }

        .profile-info {
            display: flex;
            align-items: center;
        }

        .profile-info img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .profile-details {
            flex: 1;
        }

        .profile-details h2 {
            margin-top: 0;
        }

        .profile-details p {
            margin-bottom: 10px;
        }

        .update-form input[type="file"] {
            margin-bottom: 10px;
        }



        .update-form input[type="text"],
        .update-form input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .update-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .logout-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }




        .update-form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .logout-form input[type="Logout"]:hover {
            background-color: #45a049;
        }
    </style>
</head>


<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </div>
        <h2>User Profile</h2>
        <div class="profile-info">
            <?php
            require('conn.php'); // Include your database connection script

            // Fetch user data from the database
            $query = "SELECT * FROM users WHERE id = $user_id";
            $result = mysqli_query($con, $query);
            $user = mysqli_fetch_assoc($result);

            // Display user information
            if ($user) {
                echo '<img src="uploads/' . $user['img'] . '" alt="Profile Picture">';
                echo "<div class='profile-details'>";
                echo "<h2>{$user['firstname']} {$user['lastname']}</h2>";
                echo "<p>Username: {$user['username']}</p>";


                echo "</div>";
            }
            ?>
        </div>

        <hr>
        <h3>Update Profile Picture</h3>
        <form class="update-form" action="update_profile.php" method="post" enctype="multipart/form-data">
            <input type="file" name="profile_picture" accept="image/*" required>
            <input type="submit" value="Upload">
        </form>
        <hr>
        <h3>Update Profile Information</h3>
        <form class="update-form" action="update_profile_info.php" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required><br>
            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user['address']); ?>" required><br>
            <!-- Add more fields for other profile information -->
            <input type="submit" value="Update">
        </form>
        <hr>
        <h3>Logout</h3>
        <form class="logout-form" action="logout.php" method="post">
            <input type="submit" value="Logout">
        </form>

    </div>
</body>

</html>