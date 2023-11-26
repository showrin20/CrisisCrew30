<?php
// Sample user data (replace this with actual data fetched from a database)
$firstName = "John";
$lastName = "Smith";
$email = "john.smith@example.com";
$contact = "+1234567890";
$address = "123 Main Street, Cityville";
$location = "City";
$gender = "Male";
$bloodGroup = "O+";
$DOB = "1990-01-01";
$skills = ["Fire Suppression Techniques", "Emergency Evacuation Planning"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css"/>

    <!-- Additional Styles -->
    <style>
        /* Add your custom styles here */
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="profile-container">
            <h4>Welcome, <?php echo $firstName . ' ' . $lastName; ?>!</h4>
            <p>You have administrative privileges to manage Crisis Crew activities.</p>

            <!-- Display user information (you may dynamically fetch this from a database) -->
            <h5>Personal Information</h5>
            <p><strong>First Name:</strong> <?php echo $firstName ?? ''; ?></p>
            <p><strong>Last Name:</strong> <?php echo $lastName ?? ''; ?></p>
            <p><strong>Email:</strong> <?php echo $email ?? ''; ?></p>
            <p><strong>Contact:</strong> <?php echo $contact ?? ''; ?></p>
            <p><strong>Address:</strong> <?php echo $address ?? ''; ?></p>
            <p><strong>Location:</strong> <?php echo $location ?? ''; ?></p>
            <p><strong>Gender:</strong> <?php echo $gender ?? ''; ?></p>
            <p><strong>Blood Group:</strong> <?php echo $bloodGroup ?? ''; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $DOB ?? ''; ?></p>

            <!-- Additional user information -->
            <h5>Skills</h5>
            <ul>
                <?php
                    if (isset($skills) && is_array($skills)) {
                        foreach ($skills as $skill) {
                            echo "<li>$skill</li>";
                        }
                    }
                ?>
            </ul>

            <!-- Add more sections for completed training modules, crisis responses, achievements, and skills if needed -->

            <a href="edit_profile.html" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
