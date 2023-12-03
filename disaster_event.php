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

    <title>Disaster Event</title>

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
        background-color: #343a40; /* Dark background color for the sidebar */
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

      .table th,
      .table td {
        border-color: #dee2e6; /* Lighter border color for table cells */
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
              Find Your Cause, Make a Difference - VolunteerConnect, Your
              Gateway to Meaningful Impact.
            </p>
    
                <div class="container">
                  <h5 class="text-left mb-4">Event Management</h5>
                

                  <a href="add_event.php" class="btn btn-primary mb-3">Add Event</a>
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

// SQL query to retrieve data from the event table
$sql = "SELECT event_id, name, description, location, date FROM event";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="table table-striped table-bordered">';
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

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['event_id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['description'] . '</td>';
        echo '<td>' . $row['location'] . '</td>';
        echo '<td>' . $row['date'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "No records found";
}

// Close the database connection
$conn->close();
?>

                  </div>

                  <h3 class="text-center mb-4">Volunteer List</h3>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead class="thead-dark">
                        <tr>
                          <th>Name</th>
                          <th>Skills</th>
                          <th>Location</th>
                          <th>Event</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr
                          class="filterable-row"
                          data-skills="Skill 1"
                          data-location="Location 1"
                          data-event="Event 1"
                        >
                          <td>Volunteer 1</td>
                          <td>Skill 1</td>
                          <td>Location 1</td>
                          <td>Event 1</td>
                          <td>
                            <button
                              class="btn btn-success"
                              onclick="sendInvite(this)"
                            >
                              Send Invite
                            </button>
                            <button
                              class="btn btn-danger"
                              onclick="deleteVolunteer(this)"
                            >
                              Delete
                            </button>
                          </td>
                        </tr>
                        <tr
                          class="filterable-row"
                          data-skills="Skill 2"
                          data-location="Location 2"
                          data-event="Event 2"
                        >
                          <td>Volunteer 2</td>
                          <td>Skill 2</td>
                          <td>Location 2</td>
                          <td>Event 2</td>
                          <td>
                            <button
                              class="btn btn-success"
                              onclick="sendInvite(this)"
                            >
                              Send Invite
                            </button>
                            <button
                              class="btn btn-danger"
                              onclick="deleteVolunteer(this)"
                            >
                              Delete
                            </button>
                          </td>
                        </tr>
                        <tr
                          class="filterable-row"
                          data-skills="Skill 3"
                          data-location="Location 1"
                          data-event="Event 3"
                        >
                          <td>Volunteer 3</td>
                          <td>Skill 3</td>
                          <td>Location 1</td>
                          <td>Event 3</td>
                          <td>
                            <button
                              class="btn btn-success"
                              onclick="sendInvite(this)"
                            >
                              Send Invite
                            </button>
                            <button
                              class="btn btn-danger"
                              onclick="deleteVolunteer(this)"
                            >
                              Delete
                            </button>
                          </td>
                        </tr>
                        <!-- Add more rows for additional volunteers and events -->
                      </tbody>
                    </table>
                  </div>
                </div>

                <!-- Bootstrap JS and Popper.js (optional) -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                <script>
                  // JavaScript function to filter the table based on selected skills and location
                  function filterTable() {
                    var skillsFilter =
                      document.getElementById("filterSkills").value;
                    var locationFilter =
                      document.getElementById("filterLocation").value;

                    var rows =
                      document.getElementsByClassName("filterable-row");

                    for (var i = 0; i < rows.length; i++) {
                      var skills = rows[i].getAttribute("data-skills");
                      var location = rows[i].getAttribute("data-location");

                      var showRow =
                        (skillsFilter === "All" || skills === skillsFilter) &&
                        (locationFilter === "All" ||
                          location === locationFilter);

                      rows[i].style.display = showRow ? "" : "none";
                    }
                  }

                  // JavaScript function for sending invite
                  function sendInvite(button) {
                    // Add your logic for sending invite here
                    alert("Invite sent!");
                  }

                  // JavaScript function for deleting volunteer
                  function deleteVolunteer(button) {
                    // Add your logic for deleting volunteer here
                    alert("Volunteer deleted!");
                  }

                  // Attach the filterTable function to the change event of the filter dropdowns
                  document
                    .getElementById("filterSkills")
                    .addEventListener("change", filterTable);
                  document
                    .getElementById("filterLocation")
                    .addEventListener("change", filterTable);
                </script>
              
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
