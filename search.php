<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// Check if search parameters are present in the URL
if (isset($_GET['searchOption']) && isset($_GET['searchInput'])) {
    $searchOption = $_GET['searchOption'];
    $searchInput = $_GET['searchInput'];

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

    // Build the SQL query based on the selected search option
    $query = "SELECT * FROM volunteers WHERE ";

    switch ($searchOption) {
        case "location":
            $query .= "location LIKE '%$searchInput%'";
            break;
        case "bloodGroup":
            $query .= "bloodGroup LIKE '%$searchInput%'";
            break;
    }

    // Execute the SQL query
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Redirect to the admin_dashboard.php page with search results as URL parameters
        header("Location: admin_dashboard.php?searchOption=$searchOption&searchInput=$searchInput");
        exit();
    }
} else {
    // Handle the case when search parameters are not present in the URL
    echo "<tr><td colspan='4'>No search parameters provided</td></tr>";
}
?>
