<?php

// Assuming you have a database connection in 'dbh.php'
require_once('dbh.php');

// Fetching form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$location = $_POST['location'];
$gender = $_POST['gender'];
$bloodGroup = $_POST['bloodGroup'];
$achievements = $_POST['DOB'];

// File handling
$files = $_FILES['file'];
$filename = $files['name'];
$filetemp = $files['tmp_name'];
$fileext = explode('.', $filename);
$filecheck = strtolower(end($fileext));
$fileextstored = array('png', 'jpg', 'jpeg');

if (in_array($filecheck, $fileextstored)) {
    $destinationfile = 'images/' . $filename;
    move_uploaded_file($filetemp, $destinationfile);
} else {
    $destinationfile = 'images/no.jpg'; // Default image if file type is not allowed
}

// Checkbox skills handling
$skills = isset($_POST['skills']) ? implode(', ', $_POST['skills']) : '';

// Inserting data into the 'volunteers' table
$sql = "INSERT INTO `volunteers`(`id`, `firstName`, `lastName`, `email`, `contact`, `address`, `location`, `gender`, `bloodGroup`, `achievements`, `skills`, `pic`)
        VALUES ('', '$firstName', '$lastName', '$email', '$contact', '$address', '$location', '$gender', '$bloodGroup', '$achievements', '$skills', '$destinationfile')";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Successfully Registered as a Volunteer')
    window.location.href='your_success_page.php';
    </SCRIPT>");
} else {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Register as a Volunteer')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}

?>
