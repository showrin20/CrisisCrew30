<?php
session_start();

// Replace these with your actual database credentials
$servername = "localhost";
$username = "sowadrahman";
$password = "kikhobor";
$dbname = "crisiscrew20";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process registration form
    if (isset($_POST['register'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validate and sanitize input (you can add more validation)
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashedPassword')";
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
            // Redirect to the login page
            header("Location: client_login.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Process login form
    elseif (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validate and sanitize input
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        // Retrieve user data from the database based on the provided email
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verify the password
            if (password_verify($password, $row['password'])) {
                // Password is correct, set session variables and redirect to the success page
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                header("Location: client_dashboard.php");
                exit();
            } else {
                echo "Invalid password!";
            }
        } else {
            echo "User not found!";
        }
    }
}
?>