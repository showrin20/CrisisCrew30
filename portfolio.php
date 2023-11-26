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
          body {
            background-color: #f8f9fa; /* Set a light background color */
        }

        .container-fluid {
            margin-top: 20px; /* Add margin at the top for spacing */
        }

        .welcome-message {
            background-color: #fff; /* Set a white background color for the user profile */
            padding: 20px; /* Add padding for spacing */
            border-radius: 8px; /* Add border radius for rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow for depth */
        }
    </style>
</head>
<body>
    
<div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
        <nav class="col-12 col-md-3 col-lg-2 sidebar">
          <a href="index.html">
            <img src="images/CrisisCrew.png" alt="logo" class="img-fluid" />
          </a>

          <!-- Sidebar Navigation Links -->
          <div class="list-group mt-3">
            <a href="admin_dashboard.html">Dashboard</a>
            <a href="disaster_event.html">Disaster Event</a>
            <a href="task_management.html">Task Management</a>
            <a href="resource_management.html">Resource Management</a>
          </div>

          <!-- Logout Link -->
          <footer class="mt-3">
            <a href="index.html" style="color: #adb5bd">Logout</a>
          </footer>
        </nav>

        <!-- Main Content Area -->
        <div class="col-lg-10 col-md-9 col-12">
          <div class="welcome-message">
            <h4 style="color: #343a40">Welcome, <?php echo $firstName ?? ''; ?></h4>
            <p style="color: #6c757d">
              Find Your Cause, Make a Difference - VolunteerConnect, Your
              Gateway to Meaningful Impact.
            </p>

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
            <p><strong>Skills:</strong>            <ul>
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
