<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/CrisisCrew.png" type="image/x-icon">

    <title>Task Management </title>

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css"
    />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css" />

    <style>
      /* Additional Styles */
      .table-container {
        max-width: 800px;
        margin: 0 auto;
    }

    /* Adjustments for Admin Appearance */
    body {
        background-color: #f8f9fa; /* Light gray background */
    }

    .sidebar {
        background-color: #1f1c3b; /* Dark background color for the sidebar */
        color: #dee2e6; /* Light text color for the sidebar */
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); /* Subtle box shadow for the sidebar */
    }

    .list-group a {
        color: #adb5bd; /* Light text color for sidebar links */
    }

    .list-group a:hover {
        background-color: #495057; /* Darker background color on hover */
    }

    .welcome-message {
        background-color: #ffffff; /* White background for the main content area */
        padding: 20px;
        border-radius: 8px; /* Rounded corners for the content area */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle box shadow for the content area */
        margin-top: 20px;
    }

    .welcome-message h4 {
        color: #343a40; /* Dark text color for the welcome message header */
    }

    .welcome-message p {
        color: #6c757d; /* Gray text color for the welcome message paragraph */
    }

    .edit-button {
        background-color: #007bff; /* Blue background color for the edit button */
        color: #ffffff; /* White text color for the edit button */
        border: none;
    }

    .edit-button:hover {
        background-color: #0056b3; /* Darker blue background on hover */
    }

    .avatar-image {
        width: 100%; /* Make the avatar image fill its container */
    }

    /* Volunteer List Table Styles */
    .volunteer-table {
        margin-top: 30px;
    }

    .volunteer-table th, .volunteer-table td {
        border-color: #dee2e6; /* Lighter border color for table cells */
    }

    .pagination {
        margin-top: 20px;
    }

    .pagination .page-item .page-link {
        color: #007bff; /* Blue color for pagination links */
    }

    .pagination .page-item .page-link:hover {
        background-color: #007bff; /* Darker blue background on hover */
        border-color: #007bff;
    }
    </style>
  </head>

  <body>
  <div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
        <nav class="col-12 col-md-3 col-lg-2 sidebar">
          <a href="index.php">
            <img src="images/CrisisCrew.png" alt="logo" class="img-fluid" />
          </a>

          <!-- Sidebar Navigation Links -->
          <div class="list-group mt-3">
            <a href="admin_dashboard.php">Dashboard</a>
            <a href="disaster_event.php">Disaster Event</a>
            <a href="task_management.php">Task Management</a>
            <a href="resource_management.php">Resource Management</a>
          </div>

          <!-- Logout Link -->
          <footer class="mt-3">
            <a href="index.php" style="color: #adb5bd">Logout</a>
          </footer>
        </nav>

        <!-- Main Content Area -->
        <div class="col-lg-10 col-md-9 col-12">
          <div class="welcome-message">
            <h4 style="color: #343a40">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h4>
            <p style="color: #6c757d">
            Find Your Cause, Make a Difference , Your Gateway to Meaningful Impact. 
            </p>

            <div class="container">
                <h5 class="text-left mb-4">Task Management Table</h5>
                <a href="add_task.php" class="btn btn-primary mb-3">Add Tasks for Event</a>

                <div class="table-responsive">
<?php
// Database connection settings
$servername = "localhost";
$dbUsername = "sowadrahman";
$dbPassword = "kikhobor";
$dbname = "crisiscrew20"; // Change to the "event" database

// Create a connection to the database
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve all events
$sqlEvents = "SELECT event_id, name, description, location, date FROM event";
$resultEvents = $conn->query($sqlEvents);

if ($resultEvents === false) {
    die("Error executing events query: " . $conn->error);
}

// Get the current date
$currentDate = date("Y-m-d");

echo '<h2>Events</h2>';

if ($resultEvents->num_rows > 0) {
    echo '<table class="table table-striped">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th scope="col">Event ID</th>';
    echo '<th scope="col">Event Name</th>';
    echo '<th scope="col">Event Description</th>';
    echo '<th scope="col">Event Location</th>';
    echo '<th scope="col">Event Date</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($event = $resultEvents->fetch_assoc()) {
        // Filter events that are not in the past
        if ($event['date'] >= $currentDate) {
            echo '<tr>';
            echo '<td>' . $event['event_id'] . '</td>';
            echo '<td>' . $event['name'] . '</td>';
            echo '<td>' . $event['description'] . '</td>';
            echo '<td>' . $event['location'] . '</td>';
            echo '<td>' . $event['date'] . '</td>';
            echo '</tr>';
        }
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "No events found.";
}

// Close the result set for events
$resultEvents->close();

// Retrieve volunteers for the current day's event
$sqlVolunteers = "SELECT v.firstName, v.lastName, v.email, v.contact, v.skills, e.date, e.event_id 
                  FROM volunteers v 
                  JOIN event_volunteer ev ON v.id = ev.volunteer_id 
                  JOIN event e ON ev.event_id = e.event_id 
                  WHERE DATE(e.date) = ?";
$stmtVolunteers = $conn->prepare($sqlVolunteers);

if ($stmtVolunteers === false) {
    die("Error preparing volunteers statement: " . $conn->error);
}

$stmtVolunteers->bind_param("s", $currentDate);

if ($stmtVolunteers->execute()) {
    $resultVolunteers = $stmtVolunteers->get_result();

    if ($resultVolunteers->num_rows > 0) {
        echo '<h2>Volunteers for the Current Day</h2>';
        echo '<table class="table table-striped">';
        echo '<thead class="thead-dark">';
        echo '<tr>';
        echo '<th scope="col">First Name</th>';
        echo '<th scope="col">Last Name</th>';
        echo '<th scope="col">Email</th>';
        echo '<th scope="col">Contact</th>';
        echo '<th scope="col">Skills</th>';
        echo '<th scope="col">Event Date</th>';
        echo '<th scope="col">Event ID</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($volunteer = $resultVolunteers->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $volunteer['firstName'] . '</td>';
            echo '<td>' . $volunteer['lastName'] . '</td>';
            echo '<td>' . $volunteer['email'] . '</td>';
            echo '<td>' . $volunteer['contact'] . '</td>';
            echo '<td>' . $volunteer['skills'] . '</td>';
            echo '<td>' . $volunteer['date'] . '</td>';
            echo '<td>' . $volunteer['event_id'] . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo "No volunteers found for the current day's event.";
    }
} else {
    echo "Error executing volunteers query: " . $stmtVolunteers->error;
}

// Close the database connection
$conn->close();
?>

</div>

              </div>


    <!-- Bootstrap JS and Custom Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="myscript.js"></script>
  </body>
</html>
