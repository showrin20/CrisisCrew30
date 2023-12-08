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
                    <!-- <img
                      src="images/cto.jpg"
                      alt="Admin Avatar"
                      class="img-fluid badge-img rounded-circle"
                    /> -->
                  </div>
                  <div class="col-lg-8 col-md-8 col-12">
                    <h5 style="color: #343a40"><?php echo htmlspecialchars($_SESSION['username']); ?></h5>
                    <p style="color: #6c757d">
                      Role: Volunteer<br />
                    
                    </p>
                    <!-- Edit Button -->
                               <a href="update_volunteer.php" class="btn btn-primary">Edit Profile</a>

                  </div>
                </div>
              </div>
            </div>

            <div class="row" style="padding: 30px">
            <!-- First Row: Client Notifications -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="container">
                    <h5 class="text-left mb-4">Client Notifications</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <?php
                            // Database connection settings
                            $servername = "localhost";
                            $dbUsername = "sowadrahman";
                            $dbPassword = "kikhobor";
                            $dbname = "crisiscrew20"; // Change to the appropriate database name

                            // Create a connection to the database
                            $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

                            // Check the connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // SQL query to retrieve assignee data for the volunteer based on their ID
                            $sql = "SELECT task_id, resource_id, message FROM assignee WHERE id = ?";
                            $stmt = $conn->prepare($sql);

                            if ($stmt === false) {
                                die("Error preparing statement: " . $conn->error);
                            }

                            // Bind the volunteer's ID as a parameter (replace $volunteerId with the actual volunteer ID)
                            $volunteerId = 1; // Replace with the actual volunteer ID
                            $stmt->bind_param("i", $volunteerId);

                            // Execute the query
                            if ($stmt->execute()) {
                                $result = $stmt->get_result();

                                if ($result->num_rows > 0) {
                                    // Display the assignee data in an HTML table
                                    echo '<thead class="thead-dark">';
                                    echo '<tr>';
                                    echo '<th>Task ID</th>';
                                    echo '<th>Resource ID</th>';
                                    echo '<th>Message</th>';
                                    echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';

                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td>' . $row['task_id'] . '</td>';
                                        echo '<td>' . $row['resource_id'] . '</td>';
                                        echo '<td>' . $row['message'] . '</td>';
                                        echo '</tr>';
                                    }

                                    echo '</tbody>';
                                } else {
                                    echo "No assignee data found for this volunteer.";
                                }
                            } else {
                                echo "Error executing query: " . $stmt->error;
                            }

                            $stmt->close();
                            $conn->close();
                            ?>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Second Row: Today's Fire Incidents -->
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="table-container">
                    <h5 class="mb-4">Today's Fire Incidents</h5>
                    <?php
                    // Database connection settings
                    $servername = "localhost";
                    $dbUsername = "sowadrahman";
                    $dbPassword = "kikhobor";
                    $dbname = "crisiscrew20"; 

                    // Create a connection to the database
                    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

                    // Check the connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Get today's date
                    $today = date("Y-m-d");
                    echo "Today's date  " ,  $today;
                    echo "<br>";

                    // SQL query to retrieve today's events
                    $sql = "SELECT name, location, description FROM event WHERE DATE(date) = '$today'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<table class="table table-striped table-bordered">';
                        echo '<thead class="thead-dark">';
                        echo '<tr>';
                        echo '<th scope="col">Event Name</th>';
                        echo '<th scope="col">Event Location</th>';
                        echo '<th scope="col">Event Description</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['location'] . '</td>';
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

    <!-- Bootstrap JS and Custom Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="myscript.js"></script>
  </body>
</html>
