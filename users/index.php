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
            padding: 20px;
        }

        .profile-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .profile-info {
            margin-bottom: 20px;
        }

        .profile-info label {
            font-weight: bold;
        }

        .update-profile-form input[type="text"],
        .update-profile-form input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .update-profile-form input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .update-profile-form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="profile-container">
        <h2>User Profile</h2>
        <img src="default_profile_picture.jpg" alt="Profile Picture" class="profile-picture">

        <div class="profile-info">
            <label for="username">Username:</label>
            <span id="username">JohnDoe</span>
        </div>
        <div class="profile-info">
            <label for="firstname">First Name:</label>
            <span id="firstname">John</span>
        </div>
        <div class="profile-info">
            <label for="lastname">Last Name:</label>
            <span id="lastname">Doe</span>
        </div>

        <h3>Update Profile</h3>
        <form class="update-profile-form" action="update_profile.php" method="post" enctype="multipart/form-data">
            <label for="newProfilePicture">Profile Picture:</label>
            <input type="file" id="newProfilePicture" name="newProfilePicture">

            <label for="newFirstname">New First Name:</label>
            <input type="text" id="newFirstname" name="newFirstname">

            <label for="newLastname">New Last Name:</label>
            <input type="text" id="newLastname" name="newLastname">

            <input type="submit" value="Update Profile">
        </form>
    </div>

</body>

</html>