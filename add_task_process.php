<?php
// Connection parameters
$servername = "localhost";
$username = "sowadrahman";
$password = "kikhobor";
$dbname = "crisiscrew20"; // Updated to the "event" database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare statement
$query = "INSERT INTO task_event (event_id, task_description, status, name) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);

// Error checking for prepare statement
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters and execute
$stmt->bind_param("isss", $event_id, $task_description, $status, $name);

// Set parameters and execute
$event_id = mysqli_real_escape_string($conn, $_POST['event_id']);
$task_description = mysqli_real_escape_string($conn, $_POST['task_description']);
$status = mysqli_real_escape_string($conn, $_POST['status']);
$name = mysqli_real_escape_string($conn, $_POST['name']);

if ($stmt->execute()) {
    header('Location:task_management.php');
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
