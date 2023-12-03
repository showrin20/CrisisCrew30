<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header('Location: client_login.php');
    exit();
}

// Display the dashboard
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/CrisisCrew.png" type="image/x-icon">

    <title>Crisis Responders Dashboard</title>
    <link rel="stylesheet" href="css/style.css" />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css"
    />

    <style>
      /* Set a fixed sidebar */

      /* CSS */

      .table-container {
        max-width: 800px;
        margin: 0 auto;
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
          <div class="list-group mt-3">
            <a href="client_dashboard.php">Dashboard</a>
            <a href="My Profile.php">My Profile</a>  
           
          </div>

          <!-- Logout Link -->
          <footer class="mt-3">
            <a href="index.php">Logout</a>
          </footer>
        </nav>

        <div class="col-lg-10 col-md-9 col-12">
          <div class="welcome-message">
          <h4>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h4>            <p style="color: #676a6a">
              You are a <b>Crisis Cadet:</b> Progressing through 4 steps. Become
              a Crisis Captain upon completing 10 modules!
            </p>

            <!-- Badge Images -->
            <div class="row">
              <div class="col-lg-8 col-md-8 col-12">
                <img
                  src="images/steps.png"
                  alt="Crisis Cadet Badge"
                  class="img-fluid badge-img"
                />
              </div>
              <div class="col-lg-4 col-md-4 col-12">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-12">
                    <img
                      src="images/cto.jpg"
                      alt="Admin Avatar"
                      class="img-fluid badge-img rounded-circle"
                    />
                  </div>
                  <div class="col-lg-8 col-md-8 col-12">
                    <h5 style="color: #343a40"><?php echo htmlspecialchars($_SESSION['username']); ?></h5>
                    <p style="color: #6c757d">
                      Role: Volunteer<br />
                      Email:showrin@example.com<br />
                      Phone: +1 123-456-7890
                    </p>
                    <!-- Edit Button -->
                    <button
                      type="button"
                      class="btn btn-primary"
                      data-toggle="modal"
                      data-target="#editAdminModal"
                    >
                      Edit
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Training Badge and Fire Incidents Table -->
            <div class="row" style="padding: 30px">
              <div class="col-lg-6 col-md-6 col-12">
                <div class="container">
                  <h5 class="text-left mb-4">Client Notifications</h5>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead class="thead-dark">
                        <tr>
                          <th>Date</th>
                          <th>Notification</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Today</td>
                          <td>No Notification</td>
                          <td></td>
                        </tr>
                        <!-- Example notification row with buttons -->
                        <tr>
                          <td>2023-01-01</td>
                          <td>You have a new task assigned.</td>
                          <td>
                            <button class="btn btn-success btn-sm" style="margin: 2px; width: 60px;">Accept</button>
                            <button class="btn btn-danger btn-sm" style="margin: 2px; width: 60px;">Delete</button> </td>
                          </td>
                        </tr>
                        <!-- Add more rows for additional notifications -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="table-container">
                  <h5 class="mb-4">Today's Fire Incidents</h5>
                  <?php
// Database connection settings
$servername = "localhost";
$dbUsername = "sowadrahman";
$dbPassword = "kikhobor";
$dbname = "crisiscrew20"; 
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get today's date
$today = date("Y-m-d");

// SQL query to retrieve today's events
$sql = "SELECT event_id, name, description, location, date FROM event WHERE date = '$today'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="table table-striped table-bordered">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th scope="col">No.</th>';
    echo '<th scope="col">Location</th>';
    echo '<th scope="col">Time</th>';
    echo '<th scope="col">Details</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<th scope="row">' . $row['event_id'] . '</th>';
        echo '<td>' . $row['location'] . '</td>';
        // You may need to adjust the time format based on your database schema
        echo '<td>' . date("h:i A", strtotime($row['date'])) . '</td>';
        echo '<td>' . $row['description'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "No event today";
}

// Close the database connection
$conn->close();
?>




                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS and Custom Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="myscript.js"></script>
  </body>
</html>
